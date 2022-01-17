<?php

namespace ElemeOpenApi\Api;

/**
 * 签约服务
 */
class PacksService extends RpcService
{

    /** 查询店铺当前生效合同类型
     * @param $shop_id 店铺id
     * @return mixed
     */
    public function get_effect_service_pack_contract($shop_id)
    {
        return $this->client->call("eleme.packs.getEffectServicePackContract", array("shopId" => $shop_id));
    }

}