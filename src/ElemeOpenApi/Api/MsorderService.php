<?php

namespace ElemeOpenApi\Api;

/**
 * 商家服务中台服务
 */
class MsorderService extends RpcService
{

    /** 服务单-列表查询
     * @param $query_list_request 服务单列表查询入参
     * @return mixed
     */
    public function query_list($query_list_request)
    {
        return $this->client->call("eleme.msorder.queryList", array("queryListRequest" => $query_list_request));
    }

    /** 投诉单-明细查询
     * @param $query_complaint_detail_request 投诉单详情入参
     * @return mixed
     */
    public function query_complaint_detail($query_complaint_detail_request)
    {
        return $this->client->call("eleme.msorder.queryComplaintDetail", array("queryComplaintDetailRequest" => $query_complaint_detail_request));
    }

    /** 投诉单-协商同意
     * @param $complaint_agree_request 商户同意投诉入参
     * @return mixed
     */
    public function complaint_agree($complaint_agree_request)
    {
        return $this->client->call("eleme.msorder.complaintAgree", array("complaintAgreeRequest" => $complaint_agree_request));
    }

    /** 投诉单-申请平台介入
     * @param $complaint_apply_platform_request 商家申请平台介入入参
     * @return mixed
     */
    public function complaint_apply_platform($complaint_apply_platform_request)
    {
        return $this->client->call("eleme.msorder.complaintApplyPlatform", array("complaintApplyPlatformRequest" => $complaint_apply_platform_request));
    }

    /** 投诉单-发券
     * @param $complaint_send_voucher_request 商家发券入参
     * @return mixed
     */
    public function complaint_send_voucher($complaint_send_voucher_request)
    {
        return $this->client->call("eleme.msorder.complaintSendVoucher", array("complaintSendVoucherRequest" => $complaint_send_voucher_request));
    }

}