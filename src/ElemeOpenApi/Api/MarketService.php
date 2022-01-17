<?php

namespace ElemeOpenApi\Api;

/**
 * 服务市场服务
 */
class MarketService extends RpcService
{

    /** 同步某一段时间内的服务市场消息
     * @param $start 开始时间
     * @param $end 结束时间
     * @param $offset 消息偏移量
     * @param $limit 查询消息数
     * @return mixed
     */
    public function sync_market_messages($start, $end, $offset, $limit)
    {
        return $this->client->call("eleme.market.syncMarketMessages", array("start" => $start, "end" => $end, "offset" => $offset, "limit" => $limit));
    }

    /** 创建内购项目订单
     * @param $request 创建订单请求信息
     * @return mixed
     */
    public function create_order($request)
    {
        return $this->client->call("eleme.market.createOrder", array("request" => $request));
    }

    /** 查询服务市场订单
     * @param $order_no 服务市场订单编号
     * @return mixed
     */
    public function query_order($order_no)
    {
        return $this->client->call("eleme.market.queryOrder", array("orderNo" => $order_no));
    }

    /** 服务市场确认订单
     * @param $order_no 服务市场订单编号
     * @return mixed
     */
    public function confirm_order($order_no)
    {
        return $this->client->call("eleme.market.confirmOrder", array("orderNo" => $order_no));
    }

    /** 物联网设备确认出餐
     * @param $device_info 设备信息
     * @param $order_id 订单id
     * @return mixed
     */
    public function mark_finish_cooking_time($device_info, $order_id)
    {
        return $this->client->call("eleme.market.markFinishCookingTime", array("deviceInfo" => $device_info, "orderId" => $order_id));
    }

    /** 线下服务上传订单物流单号
     * @param $logistic_infos 订单物流信息(最多100条)
     * @return mixed
     */
    public function upload_logistic_info($logistic_infos)
    {
        return $this->client->call("eleme.market.uploadLogisticInfo", array("logisticInfos" => $logistic_infos));
    }

    /** 获取文件上传秘钥信息
    
     * @return mixed
     */
    public function get_upload_file_signature_info()
    {
        return $this->client->call("eleme.market.getUploadFileSignatureInfo", array());
    }

    /** 上传图片信息
     * @param $image_infos 图片信息(最多100条)
     * @return mixed
     */
    public function upload_image_info($image_infos)
    {
        return $this->client->call("eleme.market.uploadImageInfo", array("imageInfos" => $image_infos));
    }

}