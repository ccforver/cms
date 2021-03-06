<?php
/**
 * @author: cc_forever<1253705861@qq.com>
 * @day: 2020/7/21
 */

namespace App;

use App\CcForever\interfaces\ModelInterface;
use App\CcForever\model\BaseModel;
use App\CcForever\traits\ModelTraits;

/**
 * 菜单Model
 * Class Menus
 * @package App
 */
class Menus extends BaseModel implements ModelInterface
{
    use ModelTraits;

    protected $primaryKey = 'id'; // 表主键

    protected $table = 'menus'; // 表名称

    /**
     * 表名称 ModelTraits 使用
     *
     * @var string
     */
    protected static $modelTable = 'menus';

    /**
     * 表所有字段
     *
     * @var array
     */
    private static $select = ['id', 'name', 'parent_id', 'routes', 'page', 'icon', 'menu', 'add_time', 'sort', 'is_del'];

    /**
     * 基本信息
     *
     * @var array
     */
    private static $message = ['id', 'name', 'parent_id', 'routes', 'page', 'icon', 'menu', 'add_time', 'sort'];

    /**
     * 编号查询 唯一索引
     * @param $query
     * @param int $id
     * @return mixed
     */
    public static function scopeId($query, int $id)
    {
        return $query->where(self::GetAlias().'id', $id);
    }

    /**
     * 编号批量查询 唯一索引
     * @param $query
     * @param array $ids
     * @return mixed
     */
    public static function scopeIds($query, array $ids)
    {
        return $query->whereIn(self::GetAlias().'id', $ids);
    }

    /**
     * 路由地址查询 唯一索引
     * @param $query
     * @param string $routes
     * @return mixed
     */
    public static function scopeRoutes($query, string $routes)
    {
        return $query->where(self::GetAlias().'routes', $routes);
    }

    /**
     * 上级菜单查询 普通索引
     * @param $query
     * @param int $parentId
     * @return mixed
     */
    public static function scopeParentId($query, int $parentId)
    {
        return $query->where(self::GetAlias().'parent_id', $parentId);
    }

    /**
     * 菜单状态查询 普通索引
     * @param $query
     * @param int $menu
     * @return mixed
     */
    public static function scopeMenu($query, int $menu)
    {
        return $query->where(self::GetAlias().'menu', $menu);
    }

    /**
     * 菜单假删除查询 普通索引
     * @param $query
     * @param int $isDel
     * @return mixed
     */
    public static function scopeIsDel($query, int $isDel)
    {
        return $query->where(self::GetAlias().'is_del', $isDel);
    }

    /**
     * 查询条件
     * @param $query
     * @param array $where
     * @return mixed
     */
    public static function scopeListWhere($query, array $where)
    {
        $query = strlen($where['parent_id']) ? self::parentId((int)$where['parent_id']) : $query;
        $query = strlen($where['menu']) ? self::menu((int)$where['menu']) : $query;
        return $query;
    }

    /**
     * 列表
     * @param array $where
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public static function lst(array $where, int $offset, int $limit): array
    {
        // TODO: Implement lst() method.
        $model = new self;
        $model = $model->listWhere($where);
        $model = $model->isDel(0);
        $model = $model->select(self::GetMessage());
        $model = $model->offset($offset);
        $model = $model->limit($limit);
        $list = $model->get();
        $list = is_null($list) ? [] : $list->toArray();
        return $list;
    }

    /**
     * 列表查询总数
     * @param array $where
     * @return int
     */
    public static function count(array $where): int
    {
        // TODO: Implement count() method.
        return self::listWhere($where)->isDel(0)->count();
    }

    /**
     * 批量验证菜单编号
     * @param array $ids
     * @return int
     */
    public static function checkIds(array $ids): int
    {
        $count = self::ids($ids)->select('id')->isDel(0)->count();
        return $count;
    }
}