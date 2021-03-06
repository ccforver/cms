<?php
/**
 * @author: cc_forever<1253705861@qq.com>
 * @day: 2020/7/23
 */

namespace App\Repositories;

use App\CcForever\interfaces\RepositoryInterface;
use App\CcForever\traits\RepositoryReturnMsgData;
use App\Rules;

/**
 * 规则
 * Class RulesRepository
 * @package App\Repositories
 */
class RulesRepository implements RepositoryInterface
{
    use RepositoryReturnMsgData;

    public function __construct(Rules $model = null)
    {
        if(is_null($model)){
            self::loading();
        }else{
            self::$model = $model;
        }
    }

    /**
     * 手动加载Model
     */
    private static function loading(): void
    {
        self::$model = new Rules();
    }

    /**
     * 规则列表
     * @param array $where
     * @param int $page
     * @param int $limit
     * @return bool
     */
    public static function lst(array $where, int $page, int $limit): bool
    {
        // TODO: Implement lst() method.
        $adminsRepository = new AdminsRepository();
        $adminsRepository::subordinateIds($where['login_id']); // 获取当前管理员编号和下级管理员编号+
        $subordinateIds = $adminsRepository::returnData([]);
        $where['admin_id'] = array_key_exists('admin_id', $where) ? $where['admin_id'] : 0;// 创建管理员
        if($where['admin_id']){
            if(!in_array($where['admin_id'], $subordinateIds)){
                return self::setMsg('规则列表', true, []);
            }
            $where['admin_id'] = [$where['admin_id']];
        }else{// 所有的下级管理员
            $where['admin_id'] = $subordinateIds;
        }
        $count = self::$model::count($where); // 规则总数
        if($count){
            $offset = page_to_offset($page, $limit); // 获取起始值
            $list = self::$model::lst($where, $offset, $limit); // 规则列表
            return self::setMsg('规则列表', true, $list);
        }
        return self::setMsg('规则列表', true, []);// 规则列表
    }

    /**
     * 规则总数
     * @param array $where
     * @return bool
     */
    public static function count(array $where): bool
    {
        // TODO: Implement count() method.
        $adminsRepository = new AdminsRepository();
        $adminsRepository::subordinateIds($where['login_id']); // 获取当前管理员编号和下级管理员编号+
        $subordinateIds = $adminsRepository::returnData([]);
        $where['admin_id'] = array_key_exists('admin_id', $where) ? $where['admin_id'] : 0;// 创建管理员
        if($where['admin_id']){
            if(!in_array($where['admin_id'], $subordinateIds)){
                return self::setMsg('规则总数', true, 0);
            }
            $where['admin_id'] = [$where['admin_id']];
        }else{// 所有的下级管理员
            $where['admin_id'] = $subordinateIds;
        }
        $count = self::$model::count($where); // 规则总数
        return self::setMsg('规则总数', true, [$count]);
    }

    /**
     * 规则添加
     * @param array $data
     * @return bool
     */
    public static function insert(array $data): bool
    {
        // TODO: Implement insert() method.
        // 验证菜单编号是否存在
        $menuIdsStr = array_key_exists('menus_id', $data) ? $data['menus_id'] : null;
        if(is_null($menuIdsStr)){
            return self::setMsg('菜单不存在', false);
        }
        $menuIds = explode(',', $menuIdsStr);
        $menusRepository = new MenusRepository();
        $menusRepositoryModel = $menusRepository::GetModel();
        $count = $menusRepositoryModel::checkIds($menuIds);
        if($count !== count($menuIds)){
            return self::setMsg('菜单不存在', false);
        }
        $unique = create_admin_password(create_millisecond(), $data['username'].$data['admin_id']);
        $time = time();
        $rule = []; // 规则数据
        $rule['name'] = array_key_exists('name', $data) ? $data['name'] : null;
        $rule['unique'] = $unique;
        $rule['admin_id'] = array_key_exists('admin_id', $data) ? $data['admin_id'] : null;
        $rule['add_time'] = $time;
        $rule['is_del'] = 0;
        if(!check_null($rule['name'], $rule['admin_id'])){
            return self::setMsg('参数错误', false);
        }
        $ruleMenu = []; // 规则菜单数据
        $ruleMenuCount = 0;
        foreach ($menuIds as $menuId){
            $ruleMenu[$ruleMenuCount]['unique'] = $unique;
            $ruleMenu[$ruleMenuCount]['menu_id'] = (int)$menuId;
            $ruleMenu[$ruleMenuCount]['add_time'] = $time;
            $ruleMenu[$ruleMenuCount]['clear_time'] = $time;
            $ruleMenu[$ruleMenuCount]['is_del'] = 0;
            $ruleMenuCount++;
        }
        self::$model::beginTransaction(); // 开启事务
        $ruleStatus = self::$model::base_bool('insert', $rule, 0); // 添加规则
        self::$model::SetModelTable('rules_menus');
        $ruleMenusStatus = self::$model::base_bool('insert', $ruleMenu, 0); // 添加规规则菜单
        self::$model::SetModelTable('rules');
        $bool = $ruleStatus && $ruleMenusStatus;
        self::$model::checkTransaction($bool); // 事务提交
        return self::setMsg($bool ? '添加成功' : '添加失败', $bool);
    }

    /**
     * 规则修改
     * @param array $data
     * @param int $id
     * @return bool
     */
    public static function update(array $data, int $id): bool
    {
        // TODO: Implement update() method.
        // 验证编号是否存在
        $check = self::$model::base_bool('check', [], $id);
        if(!$check){
            return self::setMsg('参数错误', false);
        }
        // 判断是否是超级权限编号
        if(in_array($id, self::$model::GetSuperRuleIds())){
            // 超级权限编号不支持修改
            return self::setMsg(power_message(), false);
        }
        // 验证菜单编号是否存在
        $menuIdsStr = array_key_exists('menus_id', $data) ? $data['menus_id'] : null;
        // 验证不存在时
        if(is_null($menuIdsStr)){ return self::setMsg('菜单不存在', false); }
        // 格式化菜单编号
        $menuIds = explode(',', $menuIdsStr);
        // 去除重复菜单并修改菜单编号为整数
        $menuIds = array_flip(array_flip($menuIds));
        // 获取实际存在的菜单编号个数
        $menusRepository = new MenusRepository();
        $menusRepositoryModel = $menusRepository::GetModel();
        $count = $menusRepositoryModel::checkIds($menuIds);
        // 实际存在的菜单个数 和 用户提交的数据不一致
        if($count !== count($menuIds)){ return self::setMsg('菜单不存在', false); }
        // 验证父级菜单是否存在 如果不存在则添加父级菜单
        $menusRepository = new MenusRepository(); // 实例化MenusRepository类
        $menusTotalList = $menusRepository::menusTotalList();  // 获取所有菜单
        foreach ($menuIds as $menuId){
            $menuIds = self::addMenusParentIds($menuId, $menuIds, $menusTotalList);
        }
        $rule = []; // 规则修改信息
        // 验证规则名称是否存在
        $rule['name'] = array_key_exists('name', $data) ? $data['name'] : null;
        // 规则修改信息不完整
        if(is_null($rule['name'])){ return self::setMsg('参数错误', false); }
        // 获取规则创建者编号
        $adminId = self::$model::base_string('select', $id, 'admin_id');
        // 实例化AdminsRepository类
        $adminsRepository = new AdminsRepository();
        // 判断当前管理员是否有修改规则的权限
        $checkAdminHandleStatus = $adminsRepository::checkAdminHandle($adminId, auth('login')->id());
        // 没有权限修改
        if(!$checkAdminHandleStatus){ return self::setMsg(power_message(), false); }
        // 重置唯一值
        $unique = create_admin_password(create_millisecond(), $data['username'].$data['admin_id']);
        $rule = []; // 规则数据
        $rule['name'] = array_key_exists('name', $data) ? $data['name'] : null;
        $rule['unique'] = $unique;  // 规则表  唯一值
        $ruleMenu = []; // 规则菜单数据
        $time = time(); // 规则菜单添加时间
        $ruleMenuCount = 0;
        foreach ($menuIds as $menuId){
            $ruleMenu[$ruleMenuCount]['unique'] = $unique;  // 唯一值 和规则表一致
            $ruleMenu[$ruleMenuCount]['menu_id'] = $menuId; // 菜单编号
            $ruleMenu[$ruleMenuCount]['add_time'] = $time;  // 添加时间
            $ruleMenu[$ruleMenuCount]['clear_time'] = $time;  // 默认 清除时间和添加时间一致
            $ruleMenu[$ruleMenuCount]['is_del'] = 0;  // 是否删除  1  是  0 否
            $ruleMenuCount++;
        }
        self::$model::beginTransaction(); // 开启事务
        $ruleStatus = self::$model::base_bool('update', $rule, $id); // 添加规则
        self::$model::SetModelTable('rules_menus');
        $ruleMenusStatus = self::$model::base_bool('insert', $ruleMenu, 0); // 添加规规则菜单
        self::$model::SetModelTable('rules');
        $bool = $ruleStatus && $ruleMenusStatus;
        self::$model::checkTransaction($bool); // 事务提交
        return self::setMsg($bool ? '修改成功' : '修改失败', $bool);
    }

    /**
     * 删除规则
     * @param int $id
     * @return bool
     */
    public static function delete(int $id): bool
    {
        // TODO: Implement delete() method.
        // 验证编号是否存在
        $check = self::$model::base_bool('check', [], $id);
        // 编号不存在
        if(!$check){ return self::setMsg('参数错误', false); }
        // 判断是否是超级权限编号
        if(in_array($id, self::$model::GetSuperRuleIds())){
            // 超级权限编号不支持修改
            return self::setMsg(power_message(), false);
        }
        // 获取规则信息  规则创建者和唯一值
        $ruleMessage = self::$model::base_array('message', $id, ['admin_id', 'unique'], []);
        // 实例化AdminsRepository类
        $adminsRepository = new AdminsRepository();
        // 判断当前管理员是否有修改规则的权限
        $checkAdminHandleStatus = $adminsRepository::checkAdminHandle($ruleMessage['admin_id'], auth('login')->id());
        // 没有权限修改
        if(!$checkAdminHandleStatus){ return self::setMsg(power_message(), false); }
        self::$model::beginTransaction(); // 开启事务
        $ruleStatus = self::$model::base_bool('delete', [] , $id); // 删除规则
        self::$model::SetModelTable('rules_menus');
        $ruleMenusStatus = self::$model::base_bool('delete', [], [$ruleMessage['unique'], 'unique']); // 删除规规则菜单
        self::$model::SetModelTable('rules');
        $bool = $ruleStatus && $ruleMenusStatus;
        self::$model::checkTransaction($bool); // 事务提交
        return self::setMsg($bool ? '删除成功' : '删除失败', $bool);
    }

    /**
     * 规则信息
     * @param int $id
     * @return bool
     */
    public static function message(int $id): bool
    {
        // TODO: Implement message() method.
        $check = self::$model::base_bool('check', [], $id); // 验证编号
        if(!$check){
            return self::setMsg('规则不存在', false);
        }
        $message = self::$model::base_array('message', $id, self::$model::GetMessage(), []); // 查询规则信息
        $status = count($message);
        return self::setMsg($status ? '规则信息' : '获取失败', $status, $message);
    }

    /**
     * 添加父级菜单
     *
     * @param int $menuId
     * @param array $menuIds
     * @param array $menusIdsTotal
     * @return array
     */
    private static function addMenusParentIds(int $menuId, array $menuIds, array $menusIdsTotal): array
    {
        foreach ($menusIdsTotal as $menu){
            if($menu['mid'] == $menuId){
                if($menu['parent_id']){
                    if(!in_array($menu['parent_id'], $menuIds)){
                        array_push($menuIds, $menu['parent_id']);
                    }
                    return self::addMenusParentIds($menu['parent_id'], $menuIds, $menusIdsTotal);
                }
            }
        }
        return $menuIds;
    }

    /**
     * 规则权限验证  登陆时验证
     *
     * @param int $id
     * @return bool
     */
    public static function power(int $id): bool
    {
        $check = self::$model::base_bool('check', [], $id); // 验证编号
        if(!$check){
            return self::setMsg('规则不存在', false);
        }
        $menusRepository = new MenusRepository(); // 实例化MenusRepository类
        $menusTotalList = $menusRepository::menusTotalList();  // 获取所有菜单
        $unique = self::$model::base_string('select', $id, 'unique');  // 查询规则信息
        if(strlen($unique)){
            $menus = self::$model::menus($unique);
            $status = count($menus);
        }else{
            $menus = $menusTotalList;
            $status = true;
        }
        return self::setMsg($status ? '规则菜单列表' : '获取失败', $status, $menus);
    }

    /**
     * 规则菜单
     * @param int $id
     * @return bool
     */
    public static function menus(int $id): bool
    {
        $check = self::$model::base_bool('check', [], $id); // 验证编号
        if(!$check){
            return self::setMsg('规则不存在', false);
        }
        $menusRepository = new MenusRepository(); // 实例化MenusRepository类
        $menusTotalList = $menusRepository::menusTotalList();  // 获取所有菜单
        // 判断是否是超级权限编号
        if(in_array($id, self::$model::GetSuperRuleIds())){
            // 如果是超级权限编号 判断当前登录的管理员是否是超级管理员
            $adminId = auth('login')->id();
            $adminsRepository = new AdminsRepository();
            if(!in_array($adminId, $adminsRepository::superAdministratorIds())){
                return self::setMsg(power_message(), false);
            }
            $menus = $menusTotalList;
            $status = true;
        }else{
            $unique = self::$model::base_string('select', $id, 'unique');  // 查询规则信息
            if(strlen($unique)){
                $menus = self::$model::menus($unique);
                $status = count($menus);
            }else{
                return self::setMsg( '获取失败', false);
            }
        }
        $ids = array_map(function ($menu){
            return $menu['mid'];
        }, $menus); // 获取菜单编号
        // 删除菜单父级(个别子菜单)
        $ids = self::unsetMenuParentIds($ids, $menus, $menusTotalList, $ids[0], 0);
        $menus = self::formatMenus([], $menus, 0); // 格式化菜单
        return self::setMsg($status ? '规则菜单列表' : '获取失败', $status, compact('menus', 'ids'));
    }

    /**
     * 删除菜单父级(个别子菜单)
     * $menus 筛选的菜单编号
     * $menusList 筛选的菜单
     * $menusTotalList 全部菜单
     * $parentId 父级编号(筛选的菜单编号中的编号)
     * $key 键值(筛选的菜单编号数组的键值)
     *
     * @param array $menus
     * @param array $menusList
     * @param array $menusTotalList
     * @param int $parentId
     * @param int $key
     * @return array
     */
    public static function unsetMenuParentIds(array $menus, array $menusList, array $menusTotalList, int $parentId, int $key): array
    {
        $menusListCount = 0; // 当前菜单的子菜单总数
        $menusTotalListCount = 0; // 所有菜单的子菜单总数
        foreach ($menusList as $menu){
            if($menu['parent_id'] == $parentId){
                // 获取当前菜单的子菜单总数
                $menusListCount++;
            }
        }
        foreach ($menusTotalList as $menu){
            if($menu['parent_id'] == $parentId){
                // 获取所有菜单的子菜单总数
                $menusTotalListCount++;
            }
        }
        if($menusListCount !== $menusTotalListCount){
            // 判断当前菜单的子菜单总数和所有菜单的子菜单总数不一致时删除父级菜单
            unset($menus[$key]);
            $menus = array_values($menus);
            $key--;
        }
        $key = (int)bcadd($key, 1, 0);  // 获取下一个元素的键值
        $menusCount = (int)bcsub(count($menus), 1, 0); // 获取当前菜单的总数
        if($key > $menusCount){
            // 下一个元素的键值大于当前菜单的总数时，删除完成返回删除后的菜单编号
            return $menus;
        }
        // 重新调用删除菜单父级(个别子菜单)函数
        return self::unsetMenuParentIds($menus, $menusList, $menusTotalList, $menus[$key], $key);
    }

    /**
     * 格式化菜单
     *
     * @param array $formatMenus
     * @param array $menus
     * @param int $parentId
     * @return array
     */
    public static function formatMenus(array $formatMenus, array $menus,int $parentId): array
    {
        $loop = 0; // 循环次数
        $formatMenusChildren = []; // 子集菜单清空
        foreach ($menus as $menu){
            if($menu['parent_id'] === $parentId){
                $formatMenus[$loop]['id'] = $menu['mid'];
                $formatMenus[$loop]['label'] = $menu['mname'];
                $formatMenus[$loop]['children'] = self::formatMenus($formatMenusChildren, $menus, $menu['mid']);
                if(!count($formatMenus[$loop]['children'])){
                    unset($formatMenus[$loop]['children']);
                }
                $loop++;
            }
        }
        if(!$loop) return [];
        return $formatMenus;
    }
    /**
     * 规则列表信息
     *
     * @param int $adminId
     * @return bool
     */
    public static function rules(int $adminId): bool
    {
        $rules = []; // 规则列表信息
        $adminsRepository = new AdminsRepository();
        $adminsRepository::subordinateIds($adminId); // 获取当前管理员编号和下级管理员编号+
        $subordinateIds = $adminsRepository::returnData([]);
        if(count($subordinateIds)){ // 规则列表信息
            $rules = self::$model::rules($subordinateIds);
        }
        $status = count($rules);
        return self::setMsg($status ? '规则列表信息' : '规则列表信息', $status, $rules);
    }
}