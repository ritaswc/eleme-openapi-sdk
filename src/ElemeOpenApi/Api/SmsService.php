<?php

namespace ElemeOpenApi\Api;

/**
 * 短信服务
 */
class SmsService extends RpcService
{

    /** 发送短信
     * @param $request 短信发送请求
     * @return mixed
     */
    public function send_message($request)
    {
        return $this->client->call("eleme.sms.sendMessage", array("request" => $request));
    }

}