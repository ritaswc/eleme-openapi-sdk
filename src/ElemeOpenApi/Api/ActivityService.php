<?php

namespace ElemeOpenApi\Api;

/**
 * 活动服务
 */
class ActivityService extends RpcService
{

    /** 创建减配送费活动
     * @param $create_info 创建减配送费活动的结构体
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function create_shipping_fee_activity($create_info, $shop_id)
    {
        return $this->client->call("eleme.activity.shippingFee.createShippingFeeActivity", array("createInfo" => $create_info, "shopId" => $shop_id));
    }

    /** 作废减配送费活动
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @param $comment 作废原因
     * @return mixed
     */
    public function invalid_shipping_fee_activity($activity_id, $shop_id, $comment)
    {
        return $this->client->call("eleme.activity.shippingFee.invalidShippingFeeActivity", array("activityId" => $activity_id, "shopId" => $shop_id, "comment" => $comment));
    }

    /** 通过店铺_id查询该店铺被邀约的美食活动
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function query_invited_food_activities($shop_id)
    {
        return $this->client->call("eleme.activity.food.queryInvitedFoodActivities", array("shopId" => $shop_id));
    }

    /** 报名美食活动
     * @param $activity_id 活动Id
     * @param $activity_apply_info 活动报名信息
     * @return mixed
     */
    public function apply_food_activity($activity_id, $activity_apply_info)
    {
        return $this->client->call("eleme.activity.food.applyFoodActivity", array("activityId" => $activity_id, "activityApplyInfo" => $activity_apply_info));
    }

    /** 通过店铺_id和活动_id分页查询店铺已报名的美食活动
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @param $page_no 页码
     * @param $page_size 每页数量
     * @return mixed
     */
    public function query_food_activities($activity_id, $shop_id, $page_no, $page_size)
    {
        return $this->client->call("eleme.activity.food.queryFoodActivities", array("activityId" => $activity_id, "shopId" => $shop_id, "pageNo" => $page_no, "pageSize" => $page_size));
    }

    /** 修改美食活动的菜品库存
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @param $item_id 菜品Id
     * @param $stock 库存
     * @return mixed
     */
    public function update_food_activity_item_stock($activity_id, $shop_id, $item_id, $stock)
    {
        return $this->client->call("eleme.activity.food.updateFoodActivityItemStock", array("activityId" => $activity_id, "shopId" => $shop_id, "itemId" => $item_id, "stock" => $stock));
    }

    /** 取消参与了美食活动的菜品
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @param $item_id 菜品Id
     * @return mixed
     */
    public function offline_food_activity_item($activity_id, $shop_id, $item_id)
    {
        return $this->client->call("eleme.activity.food.offlineFoodActivityItem", array("activityId" => $activity_id, "shopId" => $shop_id, "itemId" => $item_id));
    }

    /** 作废店铺与美食活动的关联关系
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function unbind_food_activity($activity_id, $shop_id)
    {
        return $this->client->call("eleme.activity.food.unbindFoodActivity", array("activityId" => $activity_id, "shopId" => $shop_id));
    }

    /** 定向赠红包
     * @param $shop_id 店铺Id
     * @param $mobile 需要发放红包的用户手机号
     * @param $coupon_template 定向赠红包的模板信息
     * @return mixed
     */
    public function present_coupon($shop_id, $mobile, $coupon_template)
    {
        return $this->client->call("eleme.activity.coupon.presentCoupon", array("shopId" => $shop_id, "mobile" => $mobile, "couponTemplate" => $coupon_template));
    }

    /** 托管单店红包服务
     * @param $shop_ids 餐厅id列表,长度不能超过20
     * @param $hosted_type 红包服务业务类型,暂只支持超级会员,"SUPER_VIP"
     * @param $discounts 扣减额,请设置在[4,15]元,小数点后最多1位
     * @return mixed
     */
    public function host_shops($shop_ids, $hosted_type, $discounts)
    {
        return $this->client->call("eleme.activity.coupon.hostShops", array("shopIds" => $shop_ids, "hostedType" => $hosted_type, "discounts" => $discounts));
    }

    /** 查询红包服务托管情况
     * @param $shop_ids 餐厅id列表,长度不能超过20
     * @param $hosted_type 红包服务业务类型,暂只支持超级会员,"SUPER_VIP"
     * @return mixed
     */
    public function query_host_info($shop_ids, $hosted_type)
    {
        return $this->client->call("eleme.activity.coupon.queryHostInfo", array("shopIds" => $shop_ids, "hostedType" => $hosted_type));
    }

    /** 取消托管单店红包服务
     * @param $shop_ids 餐厅id列表,长度不能超过20
     * @param $hosted_type 红包服务业务类型,暂只支持超级会员,"SUPER_VIP"
     * @return mixed
     */
    public function unhost_shops($shop_ids, $hosted_type)
    {
        return $this->client->call("eleme.activity.coupon.unhostShops", array("shopIds" => $shop_ids, "hostedType" => $hosted_type));
    }

    /** 更改单店红包服务托管方式
     * @param $shop_id 店铺Id
     * @param $hosted_type 红包服务业务类型,暂只支持超级会员,"SUPER_VIP"
     * @param $o_activity_service_details 服务内容
     * @return mixed
     */
    public function rehost_shop($shop_id, $hosted_type, $o_activity_service_details)
    {
        return $this->client->call("eleme.activity.coupon.rehostShop", array("shopId" => $shop_id, "hostedType" => $hosted_type, "oActivityServiceDetails" => $o_activity_service_details));
    }

    /** 定向赠红包(单店红包)
     * @param $shop_id 店铺id
     * @param $target_list 目标列表
     * @param $target_list_type 目标类型
     * @param $target_coupon_detail 定向赠红包模板细节
     * @return mixed
     */
    public function present_target_coupons($shop_id, $target_list, $target_list_type, $target_coupon_detail)
    {
        return $this->client->call("eleme.activity.coupon.presentTargetCoupons", array("shopId" => $shop_id, "targetList" => $target_list, "targetListType" => $target_list_type, "targetCouponDetail" => $target_coupon_detail));
    }

    /** 定向赠通用红包
     * @param $chain_id 连锁店id
     * @param $target_list 目标列表
     * @param $target_list_type 目标类型
     * @param $common_target_coupon_detail 通用定向赠红包模板细节
     * @return mixed
     */
    public function present_common_target_coupons($chain_id, $target_list, $target_list_type, $common_target_coupon_detail)
    {
        return $this->client->call("eleme.activity.coupon.presentCommonTargetCoupons", array("chainId" => $chain_id, "targetList" => $target_list, "targetListType" => $target_list_type, "commonTargetCouponDetail" => $common_target_coupon_detail));
    }

    /** 分页查询店铺的定向赠红包信息
     * @param $target_coupon_query_request 定向赠红包查询入参对象
     * @return mixed
     */
    public function query_target_coupon_info($target_coupon_query_request)
    {
        return $this->client->call("eleme.activity.coupon.queryTargetCouponInfo", array("targetCouponQueryRequest" => $target_coupon_query_request));
    }

    /** 定向赠通用商品券
     * @param $chain_id 连锁店id
     * @param $target_list 目标列表
     * @param $target_list_type 目标类型
     * @param $common_target_sku_coupon_detail 通用定向赠连锁商品券模板细节
     * @return mixed
     */
    public function present_common_target_sku_coupons($chain_id, $target_list, $target_list_type, $common_target_sku_coupon_detail)
    {
        return $this->client->call("eleme.activity.coupon.presentCommonTargetSkuCoupons", array("chainId" => $chain_id, "targetList" => $target_list, "targetListType" => $target_list_type, "commonTargetSkuCouponDetail" => $common_target_sku_coupon_detail));
    }

    /** 定向赠连锁通用商品券
     * @param $chain_id 连锁店id
     * @param $target_list 目标列表
     * @param $target_list_type 目标类型
     * @param $chain_sku_coupon_detail 通用定向赠连锁商品券模板细节
     * @return mixed
     */
    public function present_chain_sku_coupons($chain_id, $target_list, $target_list_type, $chain_sku_coupon_detail)
    {
        return $this->client->call("eleme.activity.coupon.presentChainSkuCoupons", array("chainId" => $chain_id, "targetList" => $target_list, "targetListType" => $target_list_type, "chainSkuCouponDetail" => $chain_sku_coupon_detail));
    }

    /** 定向赠指定商品券
     * @param $target_list 目标列表
     * @param $target_list_type 目标类型
     * @param $sku_coupon_detail 商品券模板细节
     * @return mixed
     */
    public function present_sku_coupons($target_list, $target_list_type, $sku_coupon_detail)
    {
        return $this->client->call("eleme.activity.coupon.presentSkuCoupons", array("targetList" => $target_list, "targetListType" => $target_list_type, "skuCouponDetail" => $sku_coupon_detail));
    }

    /** 券状态变更
     * @param $criteria 券状态修改对象
     * @param $type 操作类型
     * @return mixed
     */
    public function update_coupon_status($criteria, $type)
    {
        return $this->client->call("eleme.activity.coupon.updateCouponStatus", array("criteria" => $criteria, "type" => $type));
    }

    /** 创建券模板
     * @param $activity_template 创建券模板对象
     * @return mixed
     */
    public function create_activity_template_v2($activity_template)
    {
        return $this->client->call("eleme.activity.coupon.createActivityTemplateV2", array("activityTemplate" => $activity_template));
    }

    /** 修改券模板
     * @param $update_model 修改券模板对象
     * @return mixed
     */
    public function modify_activity_template_v2($update_model)
    {
        return $this->client->call("eleme.activity.coupon.modifyActivityTemplateV2", array("updateModel" => $update_model));
    }

    /** 作废券模板
     * @param $invalid_model 作废券模板对象
     * @return mixed
     */
    public function invalid_activity_template_v2($invalid_model)
    {
        return $this->client->call("eleme.activity.coupon.invalidActivityTemplateV2", array("invalidModel" => $invalid_model));
    }

    /** 查询券模板
     * @param $query_model 查询券模板对象
     * @return mixed
     */
    public function query_by_template_id_v2($query_model)
    {
        return $this->client->call("eleme.activity.coupon.queryByTemplateIdV2", array("queryModel" => $query_model));
    }

    /** 根据券模板发券
     * @param $present_with_template_model 发券对象
     * @return mixed
     */
    public function present_coupon_with_template_id_v2($present_with_template_model)
    {
        return $this->client->call("eleme.activity.coupon.presentCouponWithTemplateIdV2", array("presentWithTemplateModel" => $present_with_template_model));
    }

    /** 查询订单内营销相关数据
     * @param $order_id 饿了么订单Id
     * @return mixed
     */
    public function query_order_subsidy($order_id)
    {
        return $this->client->call("eleme.activity.marketing.queryOrderSubsidy", array("orderId" => $order_id));
    }

    /** 创建并绑定连锁店特价活动
     * @param $activity 活动创建信息
     * @param $chain_id 连锁店Id
     * @param $shop_apply_info  绑定的商品信息
     * @return mixed
     */
    public function create_and_participate_chain_price_activity($activity, $chain_id, $shop_apply_info)
    {
        return $this->client->call("eleme.activity.skuchain.createAndParticipateChainPriceActivity", array("activity" => $activity, "chainId" => $chain_id, "shopApplyInfo" => $shop_apply_info));
    }

    /** 根据活动_id和店铺_id和商品规格_id，作废参与关系
     * @param $activity_id 活动Id
     * @param $shop_id 店铺Id
     * @param $spec_id 商品规格Id
     * @param $comment 作废原因
     * @return mixed
     */
    public function in_valid_sku_activity_by_id($activity_id, $shop_id, $spec_id, $comment)
    {
        return $this->client->call("eleme.activity.skuchain.inValidSkuActivityById", array("activityId" => $activity_id, "shopId" => $shop_id, "specId" => $spec_id, "comment" => $comment));
    }

}