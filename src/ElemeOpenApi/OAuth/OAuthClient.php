<?php

namespace ElemeOpenApi\OAuth;

use ElemeOpenApi\Config\Config;
use ElemeOpenApi\Exception\IllegalRequestException;
use Exception;

class OAuthClient
{
    private $client_id;
    private $secret;
    private $token_url;
    private $authorize_url;
    private $log;
    private $openId_rul;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->client_id = $config->get_app_key();
        $this->secret = $config->get_app_secret();
        $this->token_url = $config->get_request_url() . "/token";
        $this->authorize_url = $config->get_request_url() . "/authorize";
        $this->openId_rul = $config->get_request_url() . "/identity";
        $this->log = $config->get_log();
    }

    /**
     * 客户端模式，获取token
     * @return mixed
     */
    public function get_token_in_client_credentials()
    {
        $body = array(
            "grant_type" => "client_credentials"
        );
        $response = $this->request($body,  $this->token_url);
        return $response;
    }

    /**
     * 生成授权url
     * @param $state 状态码，通常是随机的UUID，授权成功后会原样返回，可以用于校验
     * @param $scope 授权范围，默认情况下填写"all"
     * @param $callback_url 回调地址
     * @return string
     */
    public function get_auth_url($state, $scope, $callback_url)
    {
        $url = $this->authorize_url;
        $response_type = "code";
        $client_id = $this->client_id;
        $callback = $callback_url;
        return $url . "?response_type=" . $response_type . "&client_id=" . $client_id . "&state=" . $state . "&redirect_uri=" . $callback . "&scope=" . $scope;
    }

    /**
     * 通过授权码获取token
     * @param $code 授权码
     * @param $callback_url 回调地址
     * @return mixed
     */
    public function get_token_by_code($code, $callback_url)
    {
        $body = array(
            "grant_type" => "authorization_code",
            "code" => $code,
            "redirect_uri" => $callback_url,
            "client_id" => $this->client_id
        );
        $response = $this->request($body, $this->token_url);
        return $response;
    }

    /**
     * 通过refresh_token兑换新的token
     * @param $refresh_token 刷新的token
     * @param $scope 授权范围，默认情况下填写"all"
     * @return mixed
     */
    public function get_token_by_refresh_token($refresh_token, $scope)
    {
        $body = array(
            "grant_type" => "refresh_token",
            "refresh_token" => $refresh_token,
            "scope" => $scope
        );
        $response = $this->request($body, $this->token_url);
        return $response;
    }

    /**
     * 通过code获取openId
     * @param $code 授权码
     * @param $callback_url 回调地址
     * @return mixed
     */
    public function get_openId_by_code($code, $callback_url)
    {
        $body = array(
            "grant_type" => "authorization_code",
            "code" => $code,
            "redirect_uri" => $callback_url,
            "client_id" => $this->client_id
        );
        $response = $this->request($body, $this->openId_rul);
        return $response;
    }

    private function get_headers()
    {
        return array(
            "Authorization: Basic " . base64_encode(urlencode($this->client_id) . ":" . urlencode($this->secret)),
            "Content-Type: application/x-www-form-urlencoded; charset=utf-8",
            "Accept-Encoding: gzip");
    }

    private function request($body, $url)
    {
        if ($this->log != null) {
            $this->log->info("request data: " . json_encode($body));
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->get_headers());
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "eleme-openapi-php-sdk");
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        $request_response = curl_exec($ch);
        if (curl_errno($ch)) {
            if ($this->log != null) {
                $this->log->error("error: " . curl_error($ch));
            }
            throw new Exception(curl_error($ch));
        }
        $response = json_decode($request_response);
        if (is_null($response)) {
            throw new Exception("illegal response :" . $request_response);
        }
        if (isset($response->error)) {
            throw new IllegalRequestException(json_encode($response));
        }

        if ($this->log != null) {
            $this->log->info("response: " . json_encode($response));
        }
        return $response;
    }
}

