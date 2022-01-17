<?php

namespace ElemeOpenApi\Api;

/**
 * 企业订餐商户服务
 */
class EnterpriseService extends RpcService
{

    /** 关联企业订餐到店订单
     * @param $relate_req_dto 订单关联请求
     * @return mixed
     */
    public function update_ent_arrival_order_relate($relate_req_dto)
    {
        return $this->client->call("eleme.enterprise.updateEntArrivalOrderRelate", array("relateReqDto" => $relate_req_dto));
    }

    /** 更新企业订餐店铺订单关联启用状态
     * @param $enable_request 门店启用请求
     * @return mixed
     */
    public function update_ent_arrival_shop_enable($enable_request)
    {
        return $this->client->call("eleme.enterprise.updateEntArrivalShopEnable", array("enableRequest" => $enable_request));
    }

    /** 更新企业订餐店铺在线点餐启用状态
     * @param $enable_request 门店启用请求
     * @return mixed
     */
    public function update_arrival_shop_online_order_enable($enable_request)
    {
        return $this->client->call("eleme.enterprise.updateArrivalShopOnlineOrderEnable", array("enableRequest" => $enable_request));
    }

    /** 获取饿了么企餐用户认证
     * @param $req 饿了么企餐用户
     * @return mixed
     */
    public function get_user_authentication($req)
    {
        return $this->client->call("eleme.enterprise.getUserAuthentication", array("req" => $req));
    }

    /** _i_s_v创建饿了么订单，获取订单编号
     * @param $create_req 创单参数
     * @return mixed
     */
    public function create_online_order($create_req)
    {
        return $this->client->call("eleme.enterprise.createOnlineOrder", array("createReq" => $create_req));
    }

    /** _i_s_v订单详情同步
     * @param $detail_req 订单详情
     * @return mixed
     */
    public function push_order_detail($detail_req)
    {
        return $this->client->call("eleme.enterprise.pushOrderDetail", array("detailReq" => $detail_req));
    }

    /** 加载企业订餐买单页面
     * @param $req 买单参数
     * @return mixed
     */
    public function load_payment_page($req)
    {
        return $this->client->call("eleme.enterprise.loadPaymentPage", array("req" => $req));
    }

    /** 企业付订单查询接口
     * @param $order_req_dto 订单请求
     * @return mixed
     */
    public function get_ent_arrival_order_detail($order_req_dto)
    {
        return $this->client->call("eleme.enterprise.getEntArrivalOrderDetail", array("orderReqDto" => $order_req_dto));
    }

}