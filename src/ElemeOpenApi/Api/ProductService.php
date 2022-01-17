<?php

namespace ElemeOpenApi\Api;

/**
 * 商品服务
 */
class ProductService extends RpcService
{

    /** 查询连锁总店菜单及分组信息
     * @param $mid 菜单Id
     * @return mixed
     */
    public function get_menu_with_group($mid)
    {
        return $this->client->call("eleme.product.chain.menu.getMenuWithGroup", array("mid" => $mid));
    }

    /** 分页查询连锁总店下的菜单列表
     * @param $offset 分页起始
     * @param $limit 一页个数
     * @return mixed
     */
    public function query_menu_by_page($offset, $limit)
    {
        return $this->client->call("eleme.product.chain.menu.queryMenuByPage", array("offset" => $offset, "limit" => $limit));
    }

    /** 添加连锁总店菜单
     * @param $chain_menu_base_d_t_o 添加的菜单信息
     * @return mixed
     */
    public function create_menu($chain_menu_base_d_t_o)
    {
        return $this->client->call("eleme.product.chain.menu.createMenu", array("chainMenuBaseDTO" => $chain_menu_base_d_t_o));
    }

    /** 更新连锁总店菜单
     * @param $mid 菜单Id
     * @param $chain_menu_base_d_t_o 菜单更新信息
     * @return mixed
     */
    public function update_menu($mid, $chain_menu_base_d_t_o)
    {
        return $this->client->call("eleme.product.chain.menu.updateMenu", array("mid" => $mid, "chainMenuBaseDTO" => $chain_menu_base_d_t_o));
    }

    /** 删除连锁总店菜单
     * @param $mid 菜单Id
     * @return mixed
     */
    public function delete_menu($mid)
    {
        return $this->client->call("eleme.product.chain.menu.deleteMenu", array("mid" => $mid));
    }

    /** 查询店铺下的所有有效渠道商品
     * @param $shop_id 店铺id
     * @return mixed
     */
    public function list_by_shop_id($shop_id)
    {
        return $this->client->call("eleme.product.channel.item.listByShopId", array("shopId" => $shop_id));
    }

    /** 根据商品id批量查询商品信息
     * @param $item_ids 批量商品id列表
     * @return mixed
     */
    public function list_by_item_ids($item_ids)
    {
        return $this->client->call("eleme.product.channel.item.listByItemIds", array("itemIds" => $item_ids));
    }

    /** 创建渠道商品
     * @param $item 创建商品模型
     * @return mixed
     */
    public function create($item)
    {
        return $this->client->call("eleme.product.channel.item.create", array("item" => $item));
    }

    /** 更新渠道商品
     * @param $item 更新商品模型
     * @return mixed
     */
    public function modify($item)
    {
        return $this->client->call("eleme.product.channel.item.modify", array("item" => $item));
    }

    /** 删除渠道商品
     * @param $item_id 商品Id
     * @return mixed
     */
    public function remove($item_id)
    {
        return $this->client->call("eleme.product.channel.item.remove", array("itemId" => $item_id));
    }

    /** 批量设置售卖状态
     * @param $item_sale_status_map 商品id和对应的售卖状态集合
     * @return mixed
     */
    public function batch_set_sale_status($item_sale_status_map)
    {
        return $this->client->call("eleme.product.channel.item.batchSetSaleStatus", array("itemSaleStatusMap" => $item_sale_status_map));
    }

    /** 批量设置库存
     * @param $sku_stock_map 规格id和对应的库存值
     * @return mixed
     */
    public function batch_set_stock($sku_stock_map)
    {
        return $this->client->call("eleme.product.channel.item.batchSetStock", array("skuStockMap" => $sku_stock_map));
    }

    /** 查询连锁总店商品分组
     * @param $gid 连锁总店商品分组Id
     * @return mixed
     */
    public function get_group($gid)
    {
        return $this->client->call("eleme.product.chain.group.getGroup", array("gid" => $gid));
    }

    /** 查询连锁总店商品分组及商品详情
     * @param $gid 连锁总店商品分组Id
     * @return mixed
     */
    public function get_group_with_item($gid)
    {
        return $this->client->call("eleme.product.chain.group.getGroupWithItem", array("gid" => $gid));
    }

    /** 添加连锁总店商品分组
     * @param $mid 菜单Id
     * @param $chain_group_base_d_t_o 分组创建信息
     * @return mixed
     */
    public function create_group($mid, $chain_group_base_d_t_o)
    {
        return $this->client->call("eleme.product.chain.group.createGroup", array("mid" => $mid, "chainGroupBaseDTO" => $chain_group_base_d_t_o));
    }

    /** 批量添加连锁总店商品分组
     * @param $mid 菜单Id
     * @param $chain_group_base_d_t_os 分组创建信息列表
     * @return mixed
     */
    public function batch_create_group($mid, $chain_group_base_d_t_os)
    {
        return $this->client->call("eleme.product.chain.group.batchCreateGroup", array("mid" => $mid, "chainGroupBaseDTOs" => $chain_group_base_d_t_os));
    }

    /** 更新连锁总店商品分组
     * @param $gid 连锁总店商品分组Id
     * @param $chain_group_base_d_t_o 分组更新信息
     * @return mixed
     */
    public function update_group($gid, $chain_group_base_d_t_o)
    {
        return $this->client->call("eleme.product.chain.group.updateGroup", array("gid" => $gid, "chainGroupBaseDTO" => $chain_group_base_d_t_o));
    }

    /** 删除连锁总店商品分组
     * @param $gid 连锁总店商品分组Id
     * @return mixed
     */
    public function delete_group($gid)
    {
        return $this->client->call("eleme.product.chain.group.deleteGroup", array("gid" => $gid));
    }

    /** 查询连锁总店商品规格关联的单店商品规格信息
     * @param $p_id 连锁总店商品规格Id
     * @return mixed
     */
    public function get_relation_by_pid($p_id)
    {
        return $this->client->call("eleme.product.chain.pid.getRelationByPid", array("pId" => $p_id));
    }

    /** 设置连锁总店商品规格与单店商品规格关系
     * @param $p_id 连锁总店商品规格Id
     * @param $spec_id 子店商品规格Id
     * @return mixed
     */
    public function set_pid($p_id, $spec_id)
    {
        return $this->client->call("eleme.product.chain.pid.setPid", array("pId" => $p_id, "specId" => $spec_id));
    }

    /** 批量设置连锁总店商品规格与单店商品规格关系
     * @param $p_id 连锁总店商品规格Id
     * @param $spec_ids 子店商品规格Id列表
     * @return mixed
     */
    public function batch_set_pid($p_id, $spec_ids)
    {
        return $this->client->call("eleme.product.chain.pid.batchSetPid", array("pId" => $p_id, "specIds" => $spec_ids));
    }

    /** 解除连锁总店商品规格与单店商品规格关系
     * @param $spec_id 子店的商品规格Id
     * @return mixed
     */
    public function delete_pid_by_spec_id($spec_id)
    {
        return $this->client->call("eleme.product.chain.pid.deletePidBySpecId", array("specId" => $spec_id));
    }

    /** 批量解除连锁总店商品规格与单店商品规格关系
     * @param $spec_ids 子店的商品规格Id列表
     * @return mixed
     */
    public function batch_delete_pid_by_spec_id($spec_ids)
    {
        return $this->client->call("eleme.product.chain.pid.batchDeletePidBySpecId", array("specIds" => $spec_ids));
    }

    /** 查询店铺商品分类
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function get_shop_categories($shop_id)
    {
        return $this->client->call("eleme.product.category.getShopCategories", array("shopId" => $shop_id));
    }

    /** 查询店铺商品分类，包含二级分类
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function get_shop_categories_with_children($shop_id)
    {
        return $this->client->call("eleme.product.category.getShopCategoriesWithChildren", array("shopId" => $shop_id));
    }

    /** 查询商品分类详情
     * @param $category_id 商品分类Id
     * @return mixed
     */
    public function get_category($category_id)
    {
        return $this->client->call("eleme.product.category.getCategory", array("categoryId" => $category_id));
    }

    /** 查询商品分类详情，包含二级分类
     * @param $category_id 商品分类Id
     * @return mixed
     */
    public function get_category_with_children($category_id)
    {
        return $this->client->call("eleme.product.category.getCategoryWithChildren", array("categoryId" => $category_id));
    }

    /** 添加商品分类
     * @param $shop_id 店铺Id
     * @param $name 商品分类名称，长度需在50字以内
     * @param $description 商品分类描述，长度需在50字以内
     * @return mixed
     */
    public function create_category($shop_id, $name, $description)
    {
        return $this->client->call("eleme.product.category.createCategory", array("shopId" => $shop_id, "name" => $name, "description" => $description));
    }

    /** 添加商品分类，支持二级分类
     * @param $shop_id 店铺Id
     * @param $name 商品分类名称，长度需在50字以内
     * @param $parent_id 父分类ID，如果没有可以填0
     * @param $description 商品分类描述，长度需在50字以内
     * @return mixed
     */
    public function create_category_with_children($shop_id, $name, $parent_id, $description)
    {
        return $this->client->call("eleme.product.category.createCategoryWithChildren", array("shopId" => $shop_id, "name" => $name, "parentId" => $parent_id, "description" => $description));
    }

    /** 更新商品分类
     * @param $category_id 商品分类Id
     * @param $name 商品分类名称，长度需在50字以内
     * @param $description 商品分类描述，长度需在50字以内
     * @return mixed
     */
    public function update_category($category_id, $name, $description)
    {
        return $this->client->call("eleme.product.category.updateCategory", array("categoryId" => $category_id, "name" => $name, "description" => $description));
    }

    /** 更新商品分类，包含二级分类
     * @param $category_id 商品分类Id
     * @param $name 商品分类名称，长度需在50字以内
     * @param $parent_id 父分类ID，如果没有可以填0
     * @param $description 商品分类描述，长度需在50字以内
     * @return mixed
     */
    public function update_category_with_children($category_id, $name, $parent_id, $description)
    {
        return $this->client->call("eleme.product.category.updateCategoryWithChildren", array("categoryId" => $category_id, "name" => $name, "parentId" => $parent_id, "description" => $description));
    }

    /** 删除商品分类
     * @param $category_id 商品分类Id
     * @return mixed
     */
    public function remove_category($category_id)
    {
        return $this->client->call("eleme.product.category.removeCategory", array("categoryId" => $category_id));
    }

    /** 删除商品分类(新版)
     * @param $category_id 商品分类Id
     * @return mixed
     */
    public function invalid_category($category_id)
    {
        return $this->client->call("eleme.product.category.invalidCategory", array("categoryId" => $category_id));
    }

    /** 设置分类排序
     * @param $shop_id 饿了么店铺Id
     * @param $category_ids 需要排序的分类Id
     * @return mixed
     */
    public function set_category_positions($shop_id, $category_ids)
    {
        return $this->client->call("eleme.product.category.setCategoryPositions", array("shopId" => $shop_id, "categoryIds" => $category_ids));
    }

    /** 设置分类排序(新版)
     * @param $shop_id 饿了么店铺Id
     * @param $category_ids 需要排序的全部一级分类Id
     * @return mixed
     */
    public function set_category_sequence($shop_id, $category_ids)
    {
        return $this->client->call("eleme.product.category.setCategorySequence", array("shopId" => $shop_id, "categoryIds" => $category_ids));
    }

    /** 设置二级分类排序
     * @param $shop_id 饿了么店铺Id
     * @param $category_with_children_ids 需要排序的父分类Id，及其下属的二级分类ID
     * @return mixed
     */
    public function set_category_positions_with_children($shop_id, $category_with_children_ids)
    {
        return $this->client->call("eleme.product.category.setCategoryPositionsWithChildren", array("shopId" => $shop_id, "categoryWithChildrenIds" => $category_with_children_ids));
    }

    /** 查询商品后台类目
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function get_back_category($shop_id)
    {
        return $this->client->call("eleme.product.category.getBackCategory", array("shopId" => $shop_id));
    }

    /** 设置分类类型
     * @param $shop_id 店铺Id
     * @param $category_id 商品分类Id
     * @param $category_type 分类类型
     * @return mixed
     */
    public function set_category_type($shop_id, $category_id, $category_type)
    {
        return $this->client->call("eleme.product.category.setCategoryType", array("shopId" => $shop_id, "categoryId" => $category_id, "categoryType" => $category_type));
    }

    /** 设置分组分时段置顶
     * @param $shop_id 店铺Id
     * @param $category_id 商品分类Id
     * @param $day_parting_stick 置顶时间设置
     * @return mixed
     */
    public function set_day_parting_stick_time($shop_id, $category_id, $day_parting_stick)
    {
        return $this->client->call("eleme.product.category.setDayPartingStickTime", array("shopId" => $shop_id, "categoryId" => $category_id, "dayPartingStick" => $day_parting_stick));
    }

    /** 删除分组的分时置顶功能
     * @param $shop_id 店铺Id
     * @param $category_id 商品分类Id
     * @return mixed
     */
    public function remove_day_parting_stick_time($shop_id, $category_id)
    {
        return $this->client->call("eleme.product.category.removeDayPartingStickTime", array("shopId" => $shop_id, "categoryId" => $category_id));
    }

    /** 添加套餐
     * @param $category_id 分类Id
     * @param $o_package 套餐属性
     * @return mixed
     */
    public function create_package($category_id, $o_package)
    {
        return $this->client->call("eleme.product.package.createPackage", array("categoryId" => $category_id, "oPackage" => $o_package));
    }

    /** 修改套餐基本信息
     * @param $item_id 新套餐id即OItem中的商品Id
     * @param $category_id 分类Id即OCategory中的分类Id
     * @param $update 套餐基本信息
     * @return mixed
     */
    public function update_package_content($item_id, $category_id, $update)
    {
        return $this->client->call("eleme.product.package.updatePackageContent", array("itemId" => $item_id, "categoryId" => $category_id, "update" => $update));
    }

    /** 修改套餐和主料的关联关系
     * @param $item_id 新套餐id即OItem中的商品Id
     * @param $packages 套餐关系
     * @return mixed
     */
    public function update_package_relation($item_id, $packages)
    {
        return $this->client->call("eleme.product.package.updatePackageRelation", array("itemId" => $item_id, "packages" => $packages));
    }

    /** 删除套餐
     * @param $item_id 套餐Id
     * @return mixed
     */
    public function remove_package($item_id)
    {
        return $this->client->call("eleme.product.package.removePackage", array("itemId" => $item_id));
    }

    /** 获取一个分类下的所有商品
     * @param $category_id 商品分类Id
     * @return mixed
     */
    public function get_items_by_category_id($category_id)
    {
        return $this->client->call("eleme.product.item.getItemsByCategoryId", array("categoryId" => $category_id));
    }

    /** 查询商品详情
     * @param $item_id 商品Id
     * @return mixed
     */
    public function get_item($item_id)
    {
        return $this->client->call("eleme.product.item.getItem", array("itemId" => $item_id));
    }

    /** 批量查询商品详情
     * @param $item_ids 商品Id的列表
     * @return mixed
     */
    public function batch_get_items($item_ids)
    {
        return $this->client->call("eleme.product.item.batchGetItems", array("itemIds" => $item_ids));
    }

    /** 添加商品
     * @param $category_id 商品分类Id
     * @param $properties 商品属性
     * @return mixed
     */
    public function create_item($category_id, $properties)
    {
        return $this->client->call("eleme.product.item.createItem", array("categoryId" => $category_id, "properties" => $properties));
    }

    /** 批量添加商品
     * @param $category_id 商品分类Id
     * @param $items 商品属性的列表
     * @return mixed
     */
    public function batch_create_items($category_id, $items)
    {
        return $this->client->call("eleme.product.item.batchCreateItems", array("categoryId" => $category_id, "items" => $items));
    }

    /** 批量添加商品,且忽略异常,专为星巴克开发
     * @param $category_id 商品分类Id
     * @param $items 商品属性的列表
     * @return mixed
     */
    public function batch_create_items_ignore_error($category_id, $items)
    {
        return $this->client->call("eleme.product.item.batchCreateItemsIgnoreError", array("categoryId" => $category_id, "items" => $items));
    }

    /** 更新商品
     * @param $item_id 商品Id
     * @param $category_id 商品分类Id
     * @param $properties 商品属性
     * @return mixed
     */
    public function update_item($item_id, $category_id, $properties)
    {
        return $this->client->call("eleme.product.item.updateItem", array("itemId" => $item_id, "categoryId" => $category_id, "properties" => $properties));
    }

    /** 批量更新商品接口
     * @param $requests 批量更新请求
     * @return mixed
     */
    public function batch_update_items($requests)
    {
        return $this->client->call("eleme.product.item.batchUpdateItems", array("requests" => $requests));
    }

    /** 批量置满库存
     * @param $spec_ids 商品及商品规格的列表
     * @return mixed
     */
    public function batch_fill_stock($spec_ids)
    {
        return $this->client->call("eleme.product.item.batchFillStock", array("specIds" => $spec_ids));
    }

    /** 批量沽清库存
     * @param $spec_ids 商品及商品规格的列表
     * @return mixed
     */
    public function batch_clear_stock($spec_ids)
    {
        return $this->client->call("eleme.product.item.batchClearStock", array("specIds" => $spec_ids));
    }

    /** 批量上架商品
     * @param $spec_ids 商品及商品规格的列表
     * @return mixed
     */
    public function batch_on_shelf($spec_ids)
    {
        return $this->client->call("eleme.product.item.batchOnShelf", array("specIds" => $spec_ids));
    }

    /** 批量上架商品(新版)
     * @param $item_ids 商品ID列表
     * @return mixed
     */
    public function batch_list_items($item_ids)
    {
        return $this->client->call("eleme.product.item.batchListItems", array("itemIds" => $item_ids));
    }

    /** 批量下架商品
     * @param $spec_ids 商品及商品规格的列表
     * @return mixed
     */
    public function batch_off_shelf($spec_ids)
    {
        return $this->client->call("eleme.product.item.batchOffShelf", array("specIds" => $spec_ids));
    }

    /** 批量下架商品(新版)
     * @param $item_ids 商品ID列表
     * @return mixed
     */
    public function batch_delist_items($item_ids)
    {
        return $this->client->call("eleme.product.item.batchDelistItems", array("itemIds" => $item_ids));
    }

    /** 删除商品
     * @param $item_id 商品Id
     * @return mixed
     */
    public function remove_item($item_id)
    {
        return $this->client->call("eleme.product.item.removeItem", array("itemId" => $item_id));
    }

    /** 删除商品(新版)
     * @param $item_id 商品Id
     * @return mixed
     */
    public function invalid_item($item_id)
    {
        return $this->client->call("eleme.product.item.invalidItem", array("itemId" => $item_id));
    }

    /** 批量删除商品
     * @param $item_ids 商品Id的列表
     * @return mixed
     */
    public function batch_remove_items($item_ids)
    {
        return $this->client->call("eleme.product.item.batchRemoveItems", array("itemIds" => $item_ids));
    }

    /** 批量更新商品库存
     * @param $spec_stocks 商品以及规格库存列表
     * @return mixed
     */
    public function batch_update_spec_stocks($spec_stocks)
    {
        return $this->client->call("eleme.product.item.batchUpdateSpecStocks", array("specStocks" => $spec_stocks));
    }

    /** 批量更新商品库存(新版)
     * @param $stock_map 商品规格ID和库存设值的映射
     * @return mixed
     */
    public function batch_update_stock($stock_map)
    {
        return $this->client->call("eleme.product.item.batchUpdateStock", array("stockMap" => $stock_map));
    }

    /** 设置商品排序
     * @param $category_id 商品分类Id
     * @param $item_ids 商品Id列表
     * @return mixed
     */
    public function set_item_positions($category_id, $item_ids)
    {
        return $this->client->call("eleme.product.item.setItemPositions", array("categoryId" => $category_id, "itemIds" => $item_ids));
    }

    /** 批量沽清库存并在次日2:00开始置满
     * @param $clear_stocks 店铺Id及商品Id的列表
     * @return mixed
     */
    public function clear_and_timing_max_stock($clear_stocks)
    {
        return $this->client->call("eleme.product.item.clearAndTimingMaxStock", array("clearStocks" => $clear_stocks));
    }

    /** 根据商品扩展码获取商品
     * @param $shop_id 店铺Id
     * @param $extend_code 商品扩展码
     * @return mixed
     */
    public function get_item_by_shop_id_and_extend_code($shop_id, $extend_code)
    {
        return $this->client->call("eleme.product.item.getItemByShopIdAndExtendCode", array("shopId" => $shop_id, "extendCode" => $extend_code));
    }

    /** 根据商品条形码获取商品
     * @param $shop_id 店铺Id
     * @param $bar_code 商品条形码
     * @return mixed
     */
    public function get_items_by_shop_id_and_bar_code($shop_id, $bar_code)
    {
        return $this->client->call("eleme.product.item.getItemsByShopIdAndBarCode", array("shopId" => $shop_id, "barCode" => $bar_code));
    }

    /** 批量修改商品价格
     * @param $shop_id 店铺Id
     * @param $spec_prices 商品Id及其下SkuId和价格对应Map(限制最多50个)
     * @return mixed
     */
    public function batch_update_prices($shop_id, $spec_prices)
    {
        return $this->client->call("eleme.product.item.batchUpdatePrices", array("shopId" => $shop_id, "specPrices" => $spec_prices));
    }

    /** 查询活动商品
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function get_item_ids_has_activity_by_shop_id($shop_id)
    {
        return $this->client->call("eleme.product.item.getItemIdsHasActivityByShopId", array("shopId" => $shop_id));
    }

    /** 查询店铺活动商品(新版)
     * @param $shop_id 店铺Id
     * @return mixed
     */
    public function get_shop_sales_items($shop_id)
    {
        return $this->client->call("eleme.product.item.getShopSalesItems", array("shopId" => $shop_id));
    }

    /** 设置订单餐盒费
     * @param $shop_id  店铺ID
     * @param $status 是否按照订单设置餐盒费
     * @param $packing_fee 订单餐盒费费用
     * @return mixed
     */
    public function set_order_packing_fee($shop_id, $status, $packing_fee)
    {
        return $this->client->call("eleme.product.item.setOrderPackingFee", array("shopId" => $shop_id, "status" => $status, "packingFee" => $packing_fee));
    }

    /** 分页获取店铺下的商品
     * @param $query_page 分页查询参数
     * @return mixed
     */
    public function query_item_by_page($query_page)
    {
        return $this->client->call("eleme.product.item.queryItemByPage", array("queryPage" => $query_page));
    }

    /** 获取原材料树（即将下线）
     * @param $shop_id 店铺ID
     * @return mixed
     */
    public function get_material_tree($shop_id)
    {
        return $this->client->call("eleme.product.item.getMaterialTree", array("shopId" => $shop_id));
    }

    /** 主料关联配料(接口已过期，请勿使用)
     * @param $shop_id 店铺ID
     * @param $main_item_id 主料ID（商品ID）
     * @param $ingredient_group  商品配料分组
     * @return mixed
     */
    public function set_ingredient($shop_id, $main_item_id, $ingredient_group)
    {
        return $this->client->call("eleme.product.item.setIngredient", array("shopId" => $shop_id, "mainItemId" => $main_item_id, "ingredientGroup" => $ingredient_group));
    }

    /** 删除配料(接口已过期，请勿使用)
     * @param $shop_id 店铺ID
     * @param $main_item_id 主料ID（商品ID）
     * @return mixed
     */
    public function remove_ingredient($shop_id, $main_item_id)
    {
        return $this->client->call("eleme.product.item.removeIngredient", array("shopId" => $shop_id, "mainItemId" => $main_item_id));
    }

    /** 针对主菜item_id设置菜品推荐
     * @param $shop_id 店铺ID
     * @param $item_id 商品ID
     * @param $related_item_ids 关联的商品ID
     * @return mixed
     */
    public function set_related_item_ids($shop_id, $item_id, $related_item_ids)
    {
        return $this->client->call("eleme.product.item.setRelatedItemIds", array("shopId" => $shop_id, "itemId" => $item_id, "relatedItemIds" => $related_item_ids));
    }

    /** 对主菜item_id设置是否开启菜品推荐
     * @param $shop_id 店铺ID
     * @param $item_id 商品ID
     * @param $display 是否展示
     * @return mixed
     */
    public function display_related_item_ids($shop_id, $item_id, $display)
    {
        return $this->client->call("eleme.product.item.displayRelatedItemIds", array("shopId" => $shop_id, "itemId" => $item_id, "display" => $display));
    }

    /** 针对主菜item_id查询菜品推荐
     * @param $shop_id 店铺ID
     * @param $item_id 商品ID
     * @return mixed
     */
    public function get_related_item_ids($shop_id, $item_id)
    {
        return $this->client->call("eleme.product.item.getRelatedItemIds", array("shopId" => $shop_id, "itemId" => $item_id));
    }

    /** 添加多规格商品
     * @param $category_id 商品分类Id
     * @param $properties 商品属性
     * @return mixed
     */
    public function create_multi_spec_item($category_id, $properties)
    {
        return $this->client->call("eleme.product.item.createMultiSpecItem", array("categoryId" => $category_id, "properties" => $properties));
    }

    /** 批量添加多规格商品
     * @param $category_id 商品分类Id
     * @param $items 商品属性的列表
     * @return mixed
     */
    public function batch_create_multi_spec_item($category_id, $items)
    {
        return $this->client->call("eleme.product.item.batchCreateMultiSpecItem", array("categoryId" => $category_id, "items" => $items));
    }

    /** 更新多规格商品
     * @param $item_id 商品Id
     * @param $category_id 商品分类Id
     * @param $properties 商品属性
     * @return mixed
     */
    public function update_multi_spec_item($item_id, $category_id, $properties)
    {
        return $this->client->call("eleme.product.item.updateMultiSpecItem", array("itemId" => $item_id, "categoryId" => $category_id, "properties" => $properties));
    }

    /** 设置配料组数据
     * @param $item_id 商品Id
     * @param $group_relations 配料组信息
     * @return mixed
     */
    public function set_ingredient_group($item_id, $group_relations)
    {
        return $this->client->call("eleme.product.item.setIngredientGroup", array("itemId" => $item_id, "groupRelations" => $group_relations));
    }

    /** 删除配料组数据
     * @param $item_id 商品Id
     * @return mixed
     */
    public function remove_ingredient_group($item_id)
    {
        return $this->client->call("eleme.product.item.removeIngredientGroup", array("itemId" => $item_id));
    }

    /** 获取商品原材料数据(新版)
     * @param $shop_id 店铺ID
     * @return mixed
     */
    public function get_item_material_tree($shop_id)
    {
        return $this->client->call("eleme.product.item.getItemMaterialTree", array("shopId" => $shop_id));
    }

    /** 创建配料组
     * @param $ingredient_group 配料组数据
     * @return mixed
     */
    public function create_ingredient_group($ingredient_group)
    {
        return $this->client->call("eleme.product.item.createIngredientGroup", array("ingredientGroup" => $ingredient_group));
    }

    /** 批量创建配料组
     * @param $ingredient_groups 配料组数据
     * @return mixed
     */
    public function batch_create_ingredient_groups($ingredient_groups)
    {
        return $this->client->call("eleme.product.item.batchCreateIngredientGroups", array("ingredientGroups" => $ingredient_groups));
    }

    /** 查询配料组
     * @param $ingredient_group_id 配料组id
     * @return mixed
     */
    public function get_ingredient_group($ingredient_group_id)
    {
        return $this->client->call("eleme.product.item.getIngredientGroup", array("ingredientGroupId" => $ingredient_group_id));
    }

    /** 批量查询配料组
     * @param $ingredient_group_ids 配料组id列表
     * @return mixed
     */
    public function list_ingredient_groups($ingredient_group_ids)
    {
        return $this->client->call("eleme.product.item.listIngredientGroups", array("ingredientGroupIds" => $ingredient_group_ids));
    }

    /** 删除配料组
     * @param $ingredient_group_id 配料组id
     * @return mixed
     */
    public function delete_ingredient_group($ingredient_group_id)
    {
        return $this->client->call("eleme.product.item.deleteIngredientGroup", array("ingredientGroupId" => $ingredient_group_id));
    }

    /** 给主料商品绑定配料组
     * @param $item_id 主料商品id
     * @param $ingredient_group_ids 配料组id列表
     * @return mixed
     */
    public function bind_ingredient_groups($item_id, $ingredient_group_ids)
    {
        return $this->client->call("eleme.product.item.bindIngredientGroups", array("itemId" => $item_id, "ingredientGroupIds" => $ingredient_group_ids));
    }

    /** 解绑配料组
     * @param $item_id 主料商品id
     * @param $ingredient_group_ids 配料组id列表
     * @return mixed
     */
    public function unbind_ingredient_groups($item_id, $ingredient_group_ids)
    {
        return $this->client->call("eleme.product.item.unbindIngredientGroups", array("itemId" => $item_id, "ingredientGroupIds" => $ingredient_group_ids));
    }

    /** 移除主料商品的全部配料组
     * @param $item_id 主料商品id
     * @return mixed
     */
    public function remove_main_item_ingredient_groups($item_id)
    {
        return $this->client->call("eleme.product.item.removeMainItemIngredientGroups", array("itemId" => $item_id));
    }

    /** 更新单店商品所属分组
     * @param $shop_id 店铺id
     * @param $item_id 商品id
     * @param $category_id 分类id
     * @return mixed
     */
    public function update_item_group($shop_id, $item_id, $category_id)
    {
        return $this->client->call("eleme.product.item.updateItemGroup", array("shopId" => $shop_id, "itemId" => $item_id, "categoryId" => $category_id));
    }

    /** 绑定商品视频
     * @param $item_id 商品id
     * @param $content_id 内容id
     * @return mixed
     */
    public function bind_video($item_id, $content_id)
    {
        return $this->client->call("eleme.product.item.bindVideo", array("itemId" => $item_id, "contentId" => $content_id));
    }

    /** 解绑商品视频
     * @param $item_id 商品id
     * @return mixed
     */
    public function unbind_video($item_id)
    {
        return $this->client->call("eleme.product.item.unbindVideo", array("itemId" => $item_id));
    }

    /** 获取一个分类下的所有商品_v2接口
     * @param $category_id 商品分类Id
     * @return mixed
     */
    public function get_items_by_category_id_v2($category_id)
    {
        return $this->client->call("eleme.product.item.getItemsByCategoryIdV2", array("categoryId" => $category_id));
    }

    /** 查询连锁总店商品信息
     * @param $iid 连锁总店商品Id
     * @return mixed
     */
    public function get_chain_item($iid)
    {
        return $this->client->call("eleme.product.chain.item.getChainItem", array("iid" => $iid));
    }

    /** 批量查询连锁总店商品信息
     * @param $iids 连锁总店商品Id列表
     * @return mixed
     */
    public function batch_get_chain_item($iids)
    {
        return $this->client->call("eleme.product.chain.item.batchGetChainItem", array("iids" => $iids));
    }

    /** 添加连锁总店商品
     * @param $gid 连锁总店商品分组Id
     * @param $chain_item_base_d_t_o 商品创建信息
     * @return mixed
     */
    public function create_chain_item($gid, $chain_item_base_d_t_o)
    {
        return $this->client->call("eleme.product.chain.item.createChainItem", array("gid" => $gid, "chainItemBaseDTO" => $chain_item_base_d_t_o));
    }

    /** 批量添加连锁总店商品
     * @param $gid 连锁总店商品分组Id
     * @param $chain_item_base_d_t_os 商品创建信息列表
     * @return mixed
     */
    public function batch_create_chain_item($gid, $chain_item_base_d_t_os)
    {
        return $this->client->call("eleme.product.chain.item.batchCreateChainItem", array("gid" => $gid, "chainItemBaseDTOs" => $chain_item_base_d_t_os));
    }

    /** 替换连锁总店商品
     * @param $gid 商品分组Id
     * @param $chain_item_d_t_o 商品替换信息
     * @return mixed
     */
    public function replace_chain_item($gid, $chain_item_d_t_o)
    {
        return $this->client->call("eleme.product.chain.item.replaceChainItem", array("gid" => $gid, "chainItemDTO" => $chain_item_d_t_o));
    }

    /** 批量替换连锁总店商品
     * @param $gid 商品分组Id
     * @param $chain_item_d_t_os 商品替换信息列表
     * @return mixed
     */
    public function batch_replace_chain_item($gid, $chain_item_d_t_os)
    {
        return $this->client->call("eleme.product.chain.item.batchReplaceChainItem", array("gid" => $gid, "chainItemDTOs" => $chain_item_d_t_os));
    }

    /** 更新连锁总店商品不包含规格信息
     * @param $iid 连锁总店商品Id
     * @param $chain_item_base_d_t_o 商品更新信息
     * @return mixed
     */
    public function update_chain_item_without_sku($iid, $chain_item_base_d_t_o)
    {
        return $this->client->call("eleme.product.chain.item.updateChainItemWithoutSku", array("iid" => $iid, "chainItemBaseDTO" => $chain_item_base_d_t_o));
    }

    /** 删除连锁总店商品
     * @param $iid 连锁总店商品Id
     * @return mixed
     */
    public function delete_chain_item($iid)
    {
        return $this->client->call("eleme.product.chain.item.deleteChainItem", array("iid" => $iid));
    }

    /** 查询连锁总店商品规格
     * @param $p_id 连锁总店商品规格Id
     * @return mixed
     */
    public function get_sku($p_id)
    {
        return $this->client->call("eleme.product.chain.item.getSku", array("pId" => $p_id));
    }

    /** 新增连锁总店商品规格
     * @param $iid 连锁总店商品Id
     * @param $chain_sku_base_d_t_o 添加规格信息
     * @return mixed
     */
    public function add_sku($iid, $chain_sku_base_d_t_o)
    {
        return $this->client->call("eleme.product.chain.item.addSku", array("iid" => $iid, "chainSkuBaseDTO" => $chain_sku_base_d_t_o));
    }

    /** 更新连锁总店商品规格
     * @param $p_id 连锁总店商品规格Id
     * @param $chain_sku_base_d_t_o 规格更新信息
     * @return mixed
     */
    public function update_sku($p_id, $chain_sku_base_d_t_o)
    {
        return $this->client->call("eleme.product.chain.item.updateSku", array("pId" => $p_id, "chainSkuBaseDTO" => $chain_sku_base_d_t_o));
    }

    /** 删除连锁总店商品规格
     * @param $p_id 连锁总店商品规格Id
     * @return mixed
     */
    public function delete_sku($p_id)
    {
        return $this->client->call("eleme.product.chain.item.deleteSku", array("pId" => $p_id));
    }

    /** 上传图片，返回图片的hash值
     * @param $image 文件内容base64编码值
     * @return mixed
     */
    public function upload_image($image)
    {
        return $this->client->call("eleme.file.uploadImage", array("image" => $image));
    }

    /** 通过远程_u_r_l上传图片，返回图片的hash值
     * @param $url 远程Url地址
     * @return mixed
     */
    public function upload_image_with_remote_url($url)
    {
        return $this->client->call("eleme.file.uploadImageWithRemoteUrl", array("url" => $url));
    }

    /** 获取上传文件的访问_u_r_l，返回文件的_url地址
     * @param $hash 图片hash值
     * @return mixed
     */
    public function get_uploaded_url($hash)
    {
        return $this->client->call("eleme.file.getUploadedUrl", array("hash" => $hash));
    }

    /** 获取上传图片的url地址(新版)
     * @param $hash 图片hash值
     * @return mixed
     */
    public function get_image_url($hash)
    {
        return $this->client->call("eleme.file.getImageUrl", array("hash" => $hash));
    }

}