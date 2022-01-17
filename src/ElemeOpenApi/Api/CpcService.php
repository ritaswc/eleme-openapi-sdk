<?php

namespace ElemeOpenApi\Api;

/**
 * CPC竞价服务
 */
class CpcService extends RpcService
{

    /** 查询余额
     * @param $shop_id 店铺ID
     * @return mixed
     */
    public function get_all_balance($shop_id)
    {
        return $this->client->call("eleme.cpc.getAllBalance", array("shopId" => $shop_id));
    }

    /** 确认店铺两证是否齐全
     * @param $shop_id 店铺ID
     * @return mixed
     */
    public function check_shop_certification($shop_id)
    {
        return $this->client->call("eleme.cpc.checkShopCertification", array("shopId" => $shop_id));
    }

    /** 查询推广信息
     * @param $shop_id 店铺ID
     * @return mixed
     */
    public function get_wager_information($shop_id)
    {
        return $this->client->call("eleme.cpc.getWagerInformation", array("shopId" => $shop_id));
    }

    /** 根据出价查询预估信息
     * @param $shop_id 店铺ID
     * @param $bid CPC出价
     * @return mixed
     */
    public function get_wager_estimate($shop_id, $bid)
    {
        return $this->client->call("eleme.cpc.getWagerEstimate", array("shopId" => $shop_id, "bid" => $bid));
    }

    /** 查询推荐价格、预估信息
     * @param $shop_id 店铺ID
     * @return mixed
     */
    public function get_suggest_wager_info($shop_id)
    {
        return $this->client->call("eleme.cpc.getSuggestWagerInfo", array("shopId" => $shop_id));
    }

    /** 查询推广修改剩余次数
     * @param $shop_id 店铺ID
     * @return mixed
     */
    public function get_residue_degree($shop_id)
    {
        return $this->client->call("eleme.cpc.getResidueDegree", array("shopId" => $shop_id));
    }

    /** 设置推广状态
     * @param $shop_id 店铺ID
     * @param $status 推广状态
     * @return mixed
     */
    public function update_wager_status($shop_id, $status)
    {
        return $this->client->call("eleme.cpc.updateWagerStatus", array("shopId" => $shop_id, "status" => $status));
    }

    /** 设置推广出价
     * @param $shop_id 店铺ID
     * @param $bid 要设置的出价(元)
     * @return mixed
     */
    public function set_wager_grade($shop_id, $bid)
    {
        return $this->client->call("eleme.cpc.setWagerGrade", array("shopId" => $shop_id, "bid" => $bid));
    }

    /** 设置预算
     * @param $shop_id 店铺ID
     * @param $budget 要设置的预算(元)
     * @return mixed
     */
    public function set_wager_budget($shop_id, $budget)
    {
        return $this->client->call("eleme.cpc.setWagerBudget", array("shopId" => $shop_id, "budget" => $budget));
    }

    /** 更新自动投放状态
     * @param $shop_id 店铺ID
     * @param $auto_status 操作状态
     * @param $launch_hours 小时集合
     * @return mixed
     */
    public function update_auto_status($shop_id, $auto_status, $launch_hours)
    {
        return $this->client->call("eleme.cpc.updateAutoStatus", array("shopId" => $shop_id, "autoStatus" => $auto_status, "launchHours" => $launch_hours));
    }

    /** 设置推广速率
     * @param $shop_id 店铺ID
     * @param $wager_speed_mode 速率类型
     * @return mixed
     */
    public function set_wager_speed($shop_id, $wager_speed_mode)
    {
        return $this->client->call("eleme.cpc.setWagerSpeed", array("shopId" => $shop_id, "wagerSpeedMode" => $wager_speed_mode));
    }

    /** 获取竞价推广实时排名
     * @param $shop_id 店铺ID
     * @return mixed
     */
    public function get_actual_ranking($shop_id)
    {
        return $this->client->call("eleme.cpc.getActualRanking", array("shopId" => $shop_id));
    }

    /** 查询推广效果数据
     * @param $shop_id 店铺ID
     * @param $begin_date 开始时间
     * @param $end_date 结束时间
     * @return mixed
     */
    public function get_u_v_summary($shop_id, $begin_date, $end_date)
    {
        return $this->client->call("eleme.cpc.getUVSummary", array("shopId" => $shop_id, "beginDate" => $begin_date, "endDate" => $end_date));
    }

    /** 查询推广点击分布信息
     * @param $shop_id 店铺ID
     * @param $begin_date 开始时间
     * @param $end_date 结束时间
     * @return mixed
     */
    public function get_rank_and_cost_info($shop_id, $begin_date, $end_date)
    {
        return $this->client->call("eleme.cpc.getRankAndCostInfo", array("shopId" => $shop_id, "beginDate" => $begin_date, "endDate" => $end_date));
    }

    /** 获取推广活跃顾客的点击结构
     * @param $shop_id 店铺ID
     * @param $date 时间
     * @return mixed
     */
    public function get_user_distribution($shop_id, $date)
    {
        return $this->client->call("eleme.cpc.getUserDistribution", array("shopId" => $shop_id, "date" => $date));
    }

}