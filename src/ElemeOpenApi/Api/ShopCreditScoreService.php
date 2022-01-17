<?php

namespace ElemeOpenApi\Api;

/**
 * 商户信用分服务
 */
class ShopCreditScoreService extends RpcService
{

    /** 连锁店根据商户_i_d集合批量查询商户信用分信息
     * @param $shop_ids 商户ID集合
     * @return mixed
     */
    public function batch_query_shop_credit_scores($shop_ids)
    {
        return $this->client->call("eleme.shopCreditScore.chain.batchQueryShopCreditScores", array("shopIds" => $shop_ids));
    }

    /** 连锁店根据商户_i_d集合批量查询店铺权益规则
     * @param $shop_ids 商户ID集合
     * @return mixed
     */
    public function batch_query_shop_equity_rules($shop_ids)
    {
        return $this->client->call("eleme.shopCreditScore.chain.batchQueryShopEquityRules", array("shopIds" => $shop_ids));
    }

    /** 连锁店根据商户_i_d集合批量查询店铺扣罚规则
     * @param $shop_ids 商户ID集合
     * @return mixed
     */
    public function batch_query_shop_punish_rules($shop_ids)
    {
        return $this->client->call("eleme.shopCreditScore.chain.batchQueryShopPunishRules", array("shopIds" => $shop_ids));
    }

    /** 连锁店根据商户_i_d集合批量查询查询商户信用分变更记录
     * @param $shop_ids 商户ID集合
     * @return mixed
     */
    public function batch_query_shop_credit_score_records($shop_ids)
    {
        return $this->client->call("eleme.shopCreditScore.chain.batchQueryShopCreditScoreRecords", array("shopIds" => $shop_ids));
    }

    /** 根据商户_i_d查询商户信用分信息
     * @param $shop_id 商户ID
     * @return mixed
     */
    public function get_shop_credit_score($shop_id)
    {
        return $this->client->call("eleme.shopCreditScore.single.getShopCreditScore", array("shopId" => $shop_id));
    }

    /** 根据商户_i_d查询店铺权益规则
     * @param $shop_id 商户ID
     * @return mixed
     */
    public function get_shop_equity_rules($shop_id)
    {
        return $this->client->call("eleme.shopCreditScore.single.getShopEquityRules", array("shopId" => $shop_id));
    }

    /** 根据商户_i_d查询店铺扣罚规则
     * @param $shop_id 商户ID
     * @return mixed
     */
    public function get_shop_punish_rules($shop_id)
    {
        return $this->client->call("eleme.shopCreditScore.single.getShopPunishRules", array("shopId" => $shop_id));
    }

    /** 查询商户信用分变更记录
     * @param $shop_id 商户ID
     * @return mixed
     */
    public function get_shop_credit_score_record($shop_id)
    {
        return $this->client->call("eleme.shopCreditScore.single.getShopCreditScoreRecord", array("shopId" => $shop_id));
    }

}