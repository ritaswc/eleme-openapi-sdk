<?php

namespace ElemeOpenApi\Protocol;

use ElemeOpenApi\Config\Config;
use ElemeOpenApi\Exception\BusinessException;
use ElemeOpenApi\Exception\ExceedLimitException;
use ElemeOpenApi\Exception\IllegalRequestException;
use ElemeOpenApi\Exception\InvalidSignatureException;
use ElemeOpenApi\Exception\InvalidTimestampException;
use ElemeOpenApi\Exception\PermissionDeniedException;
use ElemeOpenApi\Exception\ServerErrorException;
use ElemeOpenApi\Exception\UnauthorizedException;
use ElemeOpenApi\Exception\ValidationFailedException;
use Exception;

class RpcClient
{

    private $app_key;
    private $app_secret;
    private $api_request_url;
    private $token;
    private $log;

    public function __construct($token, Config $config)
    {
        $this->app_key = $config->get_app_key();
        $this->app_secret = $config->get_app_secret();
        $this->api_request_url = $config->get_request_url() . "/api/v1";
        $this->log = $config->get_log();
        $this->token = $token;
    }

    /** call server api with nop
     * @param $action
     * @param array $parameters
     * @return mixed
     * @throws BusinessException
     * @throws Exception
     */
    public function call($action, array $parameters)
    {
        $protocol = array(
            "nop" => '1.0.0',
            "id" => $this->generate_reqId(),
            "action" => $action,
            "token" => $this->token->access_token,
            "metas" => array(
                "app_key" => $this->app_key,
                "timestamp" => time(),
            ),
            "params" => $parameters,
        );

        $protocol['signature'] = $this->generate_signature($protocol);

        //如果没有参数，赋值为一个空对象
        if (count($parameters) == 0) {
            $protocol["params"] = (object)array();
        }

        $result = $this->post($this->api_request_url, $protocol);
        $response = json_decode($result, false, 512, JSON_BIGINT_AS_STRING);
        if (is_null($response)) {
            throw new Exception("invalid response.");
        }

        if (isset($response->error)) {
            switch ($response->error->code) {
                case "SERVER_ERROR":
                    throw new ServerErrorException($response->error->message);
                case "ILLEGAL_REQUEST":
                    throw new IllegalRequestException($response->error->message);
                case "UNAUTHORIZED":
                    throw new UnauthorizedException($response->error->message);
                case "ACCESS_DENIED":
                    throw new PermissionDeniedException($response->error->message);
                case "METHOD_NOT_ALLOWED":
                    throw new PermissionDeniedException($response->error->message);
                case "PERMISSION_DENIED":
                    throw new PermissionDeniedException($response->error->message);
                case "EXCEED_LIMIT":
                    throw new ExceedLimitException($response->error->message);
                case "INVALID_SIGNATURE":
                    throw new InvalidSignatureException($response->error->message);
                case "INVALID_TIMESTAMP":
                    throw new InvalidTimestampException($response->error->message);
                case "VALIDATION_FAILED":
                    throw new ValidationFailedException($response->error->message);
                default:
                    throw new BusinessException($response->error->message);
            }
        }

        return $response->result;
    }

    private function generate_signature($protocol)
    {
        $merged = array_merge($protocol['metas'], $protocol['params']);
        ksort($merged);
        $string = "";
        foreach ($merged as $key => $value) {
            $string .= $key . "=" . json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }
        $splice = $protocol['action'] . $this->token->access_token . $string . $this->app_secret;

        $encode = mb_detect_encoding($splice, array("ASCII", 'UTF-8', "GB2312", "GBK", 'BIG5'));
        if ($encode != null) {
            $splice = mb_convert_encoding($splice, 'UTF-8', $encode);
        }

        return strtoupper(md5($splice));
    }

    private function generate_reqId() 
    {
        return strtoupper(str_replace("-", "", $this -> create_uuid())) . "|" . $this -> get_millisecond();
    }

    private function get_millisecond() 
    {
        list($usec, $sec) = explode(" ", microtime());
        $msec = (string) floor($usec * 1000);
        while (strlen($msec) < 3)
        {
            $msec = "0" . $msec;
        }
        return $sec . $msec;
    }

    private function create_uuid()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    private function post($url, $data)
    {
        $log = $this->log;
        if ($log != null) {
            $log->info("request data: " . json_encode($data));
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/json; charset=utf-8", "Accept-Encoding: gzip"));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_USERAGENT, "eleme-openapi-php-sdk");
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            if ($log != null) {
                $log->error("error: " . curl_error($ch));
            }
            throw new Exception(curl_error($ch));
        }

        if ($log != null) {
            $log->info("response: " . $response);
        }

        curl_close($ch);
        return $response;
    }
}
