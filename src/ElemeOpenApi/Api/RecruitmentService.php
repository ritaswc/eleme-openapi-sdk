<?php

namespace ElemeOpenApi\Api;

/**
 * 招聘市场服务
 */
class RecruitmentService extends RpcService
{

    /** 简历回传
     * @param $resume 简历信息
     * @return mixed
     */
    public function upload_resume($resume)
    {
        return $this->client->call("eleme.recruitment.uploadResume", array("resume" => $resume));
    }

    /** 职位状态变更
     * @param $position_id 职位id
     * @param $status 变更状态
     * @return mixed
     */
    public function update_job_position_status($position_id, $status)
    {
        return $this->client->call("eleme.recruitment.updateJobPositionStatus", array("positionId" => $position_id, "status" => $status));
    }

    /** 简历状态变更
     * @param $resume_id 简历id
     * @param $status 变更状态
     * @return mixed
     */
    public function update_resume_status($resume_id, $status)
    {
        return $this->client->call("eleme.recruitment.updateResumeStatus", array("resumeId" => $resume_id, "status" => $status));
    }

    /** 回传职位曝光数据
     * @param $position_id 职位id
     * @param $expose_count 曝光数量
     * @param $visit_count 访问数量
     * @param $data_date 数据日期
     * @return mixed
     */
    public function update_position_expose_data($position_id, $expose_count, $visit_count, $data_date)
    {
        return $this->client->call("eleme.recruitment.updatePositionExposeData", array("positionId" => $position_id, "exposeCount" => $expose_count, "visitCount" => $visit_count, "dataDate" => $data_date));
    }

    /** 获取商户目前在架以及审核中岗位
    
     * @return mixed
     */
    public function get_shop_job_infos()
    {
        return $this->client->call("eleme.recruitment.getShopJobInfos", array());
    }

}