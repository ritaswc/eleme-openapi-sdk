<?php

namespace ElemeOpenApi\Api;

/**
 * 商户服务
 */
class UserService extends RpcService
{

    /** 获取商户账号信息
    
     * @return mixed
     */
    public function get_user()
    {
        return $this->client->call("eleme.user.getUser", array());
    }

    /** 获取当前授权账号的手机号,特权接口仅部分帐号可以调用
    
     * @return mixed
     */
    public function get_phone_number()
    {
        return $this->client->call("eleme.user.getPhoneNumber", array());
    }

}