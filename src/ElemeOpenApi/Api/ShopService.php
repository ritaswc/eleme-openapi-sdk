<?php

namespace ElemeOpenApi\Api;

/**
 * 店铺服务
 */
class ShopService extends RpcService
{

    /** 查询店铺信息
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function get_shop($shop_id)
    {
        return $this->client->call("eleme.shop.getShop", array("shopId" => $shop_id));
    }

    /** 更新店铺信息
     * @param $shop_id 店铺Id
     * @param $properties 店铺属性
     * @return mixed
     */
    public function update_shop($shop_id, $properties)
    {
        return $this->client->call("eleme.shop.updateShop", array("shopId" => $shop_id, "properties" => $properties));
    }

    /** 更新店铺基本信息
     * @param $shop_id 店铺Id
     * @param $properties 店铺基本属性
     * @return mixed
     */
    public function update_shop_basic_info($shop_id, $properties)
    {
        return $this->client->call("eleme.shop.updateShopBasicInfo", array("shopId" => $shop_id, "properties" => $properties));
    }

    /** 批量获取店铺简要
     * @param $shop_ids 店铺Id的列表
     * @return mixed
     */
    public function mget_shop_status($shop_ids)
    {
        return $this->client->call("eleme.shop.mgetShopStatus", array("shopIds" => $shop_ids));
    }

    /** 设置送达时间
     * @param $shop_id 店铺Id
     * @param $delivery_basic_mins 配送基准时间(单位分钟)
     * @param $delivery_adjust_mins 配送调整时间(单位分钟)
     * @return mixed
     */
    public function set_delivery_time($shop_id, $delivery_basic_mins, $delivery_adjust_mins)
    {
        return $this->client->call("eleme.shop.setDeliveryTime", array("shopId" => $shop_id, "deliveryBasicMins" => $delivery_basic_mins, "deliveryAdjustMins" => $delivery_adjust_mins));
    }

    /** 设置是否支持在线退单
     * @param $shop_id 店铺Id
     * @param $enable 是否支持
     * @return mixed
     */
    public function set_online_refund($shop_id, $enable)
    {
        return $this->client->call("eleme.shop.setOnlineRefund", array("shopId" => $shop_id, "enable" => $enable));
    }

    /** 设置是否支持预定单及预定天数
     * @param $shop_id 店铺id
     * @param $enabled 是否支持预订
     * @param $max_booking_days 最大预定天数
     * @return mixed
     */
    public function set_booking_status($shop_id, $enabled, $max_booking_days)
    {
        return $this->client->call("eleme.shop.setBookingStatus", array("shopId" => $shop_id, "enabled" => $enabled, "maxBookingDays" => $max_booking_days));
    }

    /** 批量通过店铺_id获取_oid
     * @param $shop_ids 店铺Id的列表
     * @return mixed
     */
    public function get_oid_by_shop_ids($shop_ids)
    {
        return $this->client->call("eleme.shop.getOidByShopIds", array("shopIds" => $shop_ids));
    }

    /** 更新店铺营业时间预设置
     * @param $shop_id 店铺id
     * @param $week_setting 一周营业时间预设置, 参考 OShopBusyLevelSetting weekSetting 字段定义 
     * @param $date_setting 特定日期营业时间预设置, 参考 OShopBusyLevelSetting dateSetting 字段定义 
     * @return mixed
     */
    public function update_busy_level_setting($shop_id, $week_setting, $date_setting)
    {
        return $this->client->call("eleme.shop.updateBusyLevelSetting", array("shopId" => $shop_id, "weekSetting" => $week_setting, "dateSetting" => $date_setting));
    }

    /** 获取店铺营业时间预设置
     * @param $shop_id 店铺id
     * @return mixed
     */
    public function get_busy_level_setting($shop_id)
    {
        return $this->client->call("eleme.shop.getBusyLevelSetting", array("shopId" => $shop_id));
    }

    /** 设置品牌排序权重
     * @param $shop_id 店铺Id
     * @param $weight 权重值(取值范围[0~10])
     * @return mixed
     */
    public function set_brand_rank_weight($shop_id, $weight)
    {
        return $this->client->call("eleme.shop.setBrandRankWeight", array("shopId" => $shop_id, "weight" => $weight));
    }

    /** 获取店铺可补贴配送费的标品及补贴上限
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function get_product_subsidy_limit($shop_id)
    {
        return $this->client->call("eleme.shop.getProductSubsidyLimit", array("shopId" => $shop_id));
    }

    /** 设置店铺_t模型
     * @param $shop_id 店铺Id
     * @param $delivery_time 配送总时间(单位:分钟)
     * @return mixed
     */
    public function set_shop_t_model($shop_id, $delivery_time)
    {
        return $this->client->call("eleme.shop.setShopTModel", array("shopId" => $shop_id, "deliveryTime" => $delivery_time));
    }

    /** 设置店铺假期歇业
     * @param $shop_id 店铺Id
     * @param $vocation_dates  店铺休假日期
     * @param $enabled  店铺休假是否有效
     * @return mixed
     */
    public function set_shop_vocations($shop_id, $vocation_dates, $enabled)
    {
        return $this->client->call("eleme.shop.setShopVocations", array("shopId" => $shop_id, "vocationDates" => $vocation_dates, "enabled" => $enabled));
    }

    /** 获取店铺有效的假期歇业日期
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function get_shop_vocation($shop_id)
    {
        return $this->client->call("eleme.shop.getShopVocation", array("shopId" => $shop_id));
    }

    /** 查询店铺主体资质信息
     * @param $shop_id 店铺id
     * @return mixed
     */
    public function get_shop_license($shop_id)
    {
        return $this->client->call("eleme.shop.getShopLicense", array("shopId" => $shop_id));
    }

    /** 查询长链地址
     * @param $query_long_line_address_d_t_o 查询长链地址表单
     * @return mixed
     */
    public function get_wss_address($query_long_line_address_d_t_o)
    {
        return $this->client->call("eleme.shop.im.getWssAddress", array("queryLongLineAddressDTO" => $query_long_line_address_d_t_o));
    }

    /** 查询店铺_i_m状态
     * @param $shop_id 店铺ID
     * @return mixed
     */
    public function get_i_m_status($shop_id)
    {
        return $this->client->call("eleme.shop.im.getIMStatus", array("shopId" => $shop_id));
    }

    /** 更新店铺_i_m开关状态
     * @param $shop_id 店铺ID
     * @param $status IM开关状态（0：关闭 1：开启）
     * @return mixed
     */
    public function update_i_m_status($shop_id, $status)
    {
        return $this->client->call("eleme.shop.im.updateIMStatus", array("shopId" => $shop_id, "status" => $status));
    }

    /** 提交开店申请接口
     * @param $open_store_message 开店申请表单
     * @return mixed
     */
    public function submit_open_store_message_audit($open_store_message)
    {
        return $this->client->call("eleme.shop.setup.submitOpenStoreMessageAudit", array("openStoreMessage" => $open_store_message));
    }

    /** 星巴克提交开店申请接口
     * @param $open_store_message 开店申请表单
     * @return mixed
     */
    public function submit_open_store_for_mermaid($open_store_message)
    {
        return $this->client->call("eleme.shop.setup.submitOpenStoreForMermaid", array("openStoreMessage" => $open_store_message));
    }

    /** 更新申请信息接口
     * @param $update_store_message_body 开店申请表单
     * @return mixed
     */
    public function update_open_store_message_audit($update_store_message_body)
    {
        return $this->client->call("eleme.shop.setup.updateOpenStoreMessageAudit", array("updateStoreMessageBody" => $update_store_message_body));
    }

    /** 查询请求状态接口
     * @param $submit_id 请求提交id
     * @return mixed
     */
    public function query_process_status_by_submit_id($submit_id)
    {
        return $this->client->call("eleme.shop.setup.queryProcessStatusBySubmitId", array("submitId" => $submit_id));
    }

    /** 图片上传处理接口（5_m以内图片）
     * @param $image_base64 base64字节流
     * @return mixed
     */
    public function upload_image($image_base64)
    {
        return $this->client->call("eleme.shop.setup.uploadImage", array("imageBase64" => $image_base64));
    }

    /** 图片上传处理接口（500_k以内图片）
     * @param $image_base64 base64字节流
     * @return mixed
     */
    public function upload_min_image($image_base64)
    {
        return $this->client->call("eleme.shop.setup.uploadMinImage", array("imageBase64" => $image_base64));
    }

    /** 远程上传图片接口
     * @param $url 图片url
     * @return mixed
     */
    public function upload_image_with_remote_url($url)
    {
        return $this->client->call("eleme.shop.setup.uploadImageWithRemoteUrl", array("url" => $url));
    }

}