<?php

namespace ElemeOpenApi\Api;

/**
 * 门店装修服务
 */
class DecorationService extends RpcService
{

    /** 创建招贴
     * @param $sign 招贴信息和其关联门店ID集合
     * @return mixed
     */
    public function create_sign($sign)
    {
        return $this->client->call("eleme.decoration.sign.createSign", array("sign" => $sign));
    }

    /** 修改招贴
     * @param $sign_id 招贴ID
     * @param $sign 招贴信息和其关联门店ID
     * @return mixed
     */
    public function update_sign($sign_id, $sign)
    {
        return $this->client->call("eleme.decoration.sign.updateSign", array("signId" => $sign_id, "sign" => $sign));
    }

    /** 作废招贴
     * @param $sign_id 招贴ID
     * @return mixed
     */
    public function invalid_sign($sign_id)
    {
        return $this->client->call("eleme.decoration.sign.invalidSign", array("signId" => $sign_id));
    }

    /** 获取历史上传过的招贴图片
     * @param $sign 查询条件
     * @return mixed
     */
    public function get_sign_history_image($sign)
    {
        return $this->client->call("eleme.decoration.sign.getSignHistoryImage", array("sign" => $sign));
    }

    /** 查询有效招贴集合
    
     * @return mixed
     */
    public function query_sign()
    {
        return $this->client->call("eleme.decoration.sign.querySign", array());
    }

    /** 根据招贴_i_d查询店铺招贴详情
     * @param $sign_id 招贴ID
     * @return mixed
     */
    public function get_sign_by_id($sign_id)
    {
        return $this->client->call("eleme.decoration.sign.getSignById", array("signId" => $sign_id));
    }

    /** 新增品牌故事
     * @param $story 品牌故事信息和其关联连锁店子店ID
     * @return mixed
     */
    public function create_brand_story($story)
    {
        return $this->client->call("eleme.decoration.story.createBrandStory", array("story" => $story));
    }

    /** 更新品牌故事
     * @param $brand_story_id 品牌故事ID
     * @param $story 品牌故事信息和其关联连锁店子店ID
     * @return mixed
     */
    public function update_brand_story($brand_story_id, $story)
    {
        return $this->client->call("eleme.decoration.story.updateBrandStory", array("brandStoryId" => $brand_story_id, "story" => $story));
    }

    /** 删除品牌故事
     * @param $brand_story_id 品牌故事ID
     * @return mixed
     */
    public function delete_brand_story($brand_story_id)
    {
        return $this->client->call("eleme.decoration.story.deleteBrandStory", array("brandStoryId" => $brand_story_id));
    }

    /** 查询品牌故事列表
    
     * @return mixed
     */
    public function query_brand_story_list()
    {
        return $this->client->call("eleme.decoration.story.queryBrandStoryList", array());
    }

    /** 查询当前设置的品牌故事信息
     * @param $brand_story_id 品牌故事ID
     * @return mixed
     */
    public function get_brand_story_by_id($brand_story_id)
    {
        return $this->client->call("eleme.decoration.story.getBrandStoryById", array("brandStoryId" => $brand_story_id));
    }

    /** 保存精准分类
     * @param $category 精准分类信息
     * @return mixed
     */
    public function save_category($category)
    {
        return $this->client->call("eleme.decoration.accurateCategory.saveCategory", array("category" => $category));
    }

    /** 根据门店_i_d获取精准分类
     * @param $category 查询参数
     * @return mixed
     */
    public function get_accurate_category($category)
    {
        return $this->client->call("eleme.decoration.accurateCategory.getAccurateCategory", array("category" => $category));
    }

    /** 查询精准分类
     * @param $category 查询参数
     * @return mixed
     */
    public function query_accurate_category_list($category)
    {
        return $this->client->call("eleme.decoration.accurateCategory.queryAccurateCategoryList", array("category" => $category));
    }

    /** 创建海报
     * @param $poster 海报信息和其关联门店ID和门店商品
     * @return mixed
     */
    public function create_poster($poster)
    {
        return $this->client->call("eleme.decoration.poster.createPoster", array("poster" => $poster));
    }

    /** 修改海报
     * @param $poster_id 海报ID
     * @param $poster 海报信息和其关联门店ID和门店商品
     * @return mixed
     */
    public function update_poster($poster_id, $poster)
    {
        return $this->client->call("eleme.decoration.poster.updatePoster", array("posterId" => $poster_id, "poster" => $poster));
    }

    /** 作废海报
     * @param $poster 作废海报信息
     * @return mixed
     */
    public function invalid_poster($poster)
    {
        return $this->client->call("eleme.decoration.poster.invalidPoster", array("poster" => $poster));
    }

    /** 根据海报_i_d获取海报详情
     * @param $poster_id 海报ID
     * @return mixed
     */
    public function get_poster_detail_by_id($poster_id)
    {
        return $this->client->call("eleme.decoration.poster.getPosterDetailById", array("posterId" => $poster_id));
    }

    /** 查询有效的海报信息集合
    
     * @return mixed
     */
    public function query_effective_posters()
    {
        return $this->client->call("eleme.decoration.poster.queryEffectivePosters", array());
    }

    /** 获取历史上传过的海报图片
    
     * @return mixed
     */
    public function get_poster_history_image()
    {
        return $this->client->call("eleme.decoration.poster.getPosterHistoryImage", array());
    }

    /** 保存爆款橱窗
     * @param $burst_window 爆款橱窗信息
     * @return mixed
     */
    public function save_burst_window($burst_window)
    {
        return $this->client->call("eleme.decoration.burstWindow.saveBurstWindow", array("burstWindow" => $burst_window));
    }

    /** 根据门店_i_d关闭店铺爆款橱窗
     * @param $shop_id 门店ID
     * @return mixed
     */
    public function close_burst_window_by_shop_id($shop_id)
    {
        return $this->client->call("eleme.decoration.burstWindow.closeBurstWindowByShopId", array("shopId" => $shop_id));
    }

    /** 根据店铺_i_d查询该店铺的爆款橱窗信息
     * @param $shop_id 店铺ID
     * @return mixed
     */
    public function get_burst_window_by_shop_id($shop_id)
    {
        return $this->client->call("eleme.decoration.burstWindow.getBurstWindowByShopId", array("shopId" => $shop_id));
    }

    /** 根据门店_i_d集合查询店铺爆款橱窗信息集合
     * @param $shop_ids 查询条件
     * @return mixed
     */
    public function query_burst_window_list($shop_ids)
    {
        return $this->client->call("eleme.decoration.burstWindow.queryBurstWindowList", array("shopIds" => $shop_ids));
    }

    /** 上传图片
     * @param $image 文件内容base64编码值
     * @return mixed
     */
    public function upload($image)
    {
        return $this->client->call("eleme.decoration.image.upload", array("image" => $image));
    }

    /** 根据图片_h_a_s_h值获取图片信息
     * @param $hash 图片HASH值
     * @return mixed
     */
    public function get_image($hash)
    {
        return $this->client->call("eleme.decoration.image.getImage", array("hash" => $hash));
    }

}