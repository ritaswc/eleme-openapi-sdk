<?php

namespace ElemeOpenApi\Api;

/**
 * 商户数据服务
 */
class DataService extends RpcService
{

    /** 查询指定时间段内单店营业数据汇总（历史数据）
     * @param $shop_id 店铺Id
     * @param $start_time 查询起始日期
     * @param $end_time 查询结束日期
     * @return mixed
     */
    public function get_restaurant_sale_detail($shop_id, $start_time, $end_time)
    {
        return $this->client->call("eleme.data.single.getRestaurantSaleDetail", array("shopId" => $shop_id, "startTime" => $start_time, "endTime" => $end_time));
    }

    /** 获取单店今日实时的营业数据汇总
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function get_restaurant_real_time_sale_detail($shop_id)
    {
        return $this->client->call("eleme.data.single.getRestaurantRealTimeSaleDetail", array("shopId" => $shop_id));
    }

    /** 查询指定时间段内单店相关营业数据指标增长率
     * @param $shop_id 店铺Id
     * @param $start_time 查询起始日期
     * @param $end_time 查询结束日期
     * @return mixed
     */
    public function get_restaurant_sale_ratio($shop_id, $start_time, $end_time)
    {
        return $this->client->call("eleme.data.single.getRestaurantSaleRatio", array("shopId" => $shop_id, "startTime" => $start_time, "endTime" => $end_time));
    }

    /** 查询指定日期的店铺流量数据
     * @param $shop_id 店铺ID
     * @param $date 日期
     * @return mixed
     */
    public function get_restaurant_flow_data($shop_id, $date)
    {
        return $this->client->call("eleme.data.single.getRestaurantFlowData", array("shopId" => $shop_id, "date" => $date));
    }

    /** 查询指定时间段内连锁店营业数据汇总(历史数据)
     * @param $shop_ids 连锁子店Id
     * @param $start_time 查询起始日期
     * @param $end_time 查询结束日期
     * @return mixed
     */
    public function get_chain_restaurant_sale_detail($shop_ids, $start_time, $end_time)
    {
        return $this->client->call("eleme.data.chain.getChainRestaurantSaleDetail", array("shopIds" => $shop_ids, "startTime" => $start_time, "endTime" => $end_time));
    }

    /** 获取连锁店今日实时的营业数据汇总
     * @param $shop_ids 连锁子店Id
     * @return mixed
     */
    public function get_chain_real_time_sale_detail($shop_ids)
    {
        return $this->client->call("eleme.data.chain.getChainRealTimeSaleDetail", array("shopIds" => $shop_ids));
    }

    /** 查询指定时间段内连锁店相关营业数据指标增长率
     * @param $shop_ids 连锁子店Id
     * @param $start_time 查询起始日期
     * @param $end_time 查询结束日期
     * @return mixed
     */
    public function get_chain_restaurant_sale_ratio($shop_ids, $start_time, $end_time)
    {
        return $this->client->call("eleme.data.chain.getChainRestaurantSaleRatio", array("shopIds" => $shop_ids, "startTime" => $start_time, "endTime" => $end_time));
    }

}