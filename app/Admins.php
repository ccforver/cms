<?php
/**
 * @author: cc_forever<1253705861@qq.com>
 * @day: 2020/7/20
 */

namespace App;

use App\CcForever\interfaces\ModelInterface;
use App\CcForever\model\JWTModel;
use App\CcForever\traits\ModelTraits;

/**
 * 管理员Model
 * Class Admins
 * @package App
 */
class Admins extends  JWTModel implements ModelInterface
{
    use ModelTraits;

    protected $primaryKey = 'id'; // 表主键

    protected $table = 'admins'; // 表名称

    public $timestamps = false; // 不自动更新 created_at 和 updated_at

    protected static $alias; // 表别名

    protected static $select = ['id', 'username', 'password', 'real_name', 'status', 'found', 'parent_id', 'rule_id', 'add_time', 'add_ip', 'last_ip', 'last_time', 'login_count', 'is_del']; // 表所有字段

    protected static $message = ['id', 'username', 'real_name', 'status', 'found', 'parent_id', 'rule_id', 'add_time', 'add_ip', 'last_ip', 'last_time', 'login_count'];// 基本信息

    /**
     * 管理员编号 唯一索引
     * @param $query
     * @param int $id
     * @return mixed
     */
    public static function scopeId($query, int $id)
    {
        return $query->where(self::$alias.'id', $id);
    }

    /**
     * 管理员账号 唯一索引
     * @param $query
     * @param string $username
     * @return mixed
     */
    public static function scopeUsername($query, string $username)
    {
        return $query->where(self::$alias.'username', $username);
    }

    /**
     * 上级管理员查询 普通索引
     * @param $query
     * @param int $parentId
     * @return mixed
     */
    public static function scopeParentId($query, int $parentId)
    {
        return $query->where(self::$alias.'parentId', $parentId);
    }

    /**
     * 管理员假删除查询 普通索引
     * @param $query
     * @param int $isDel
     * @return mixed
     */
    public static function scopeIsDel($query, int $isDel)
    {
        return $query->where(self::$alias.'is_del', $isDel);
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
        $query = strlen($where['username']) ? self::username($where['username']) : $query;
        return $query;
    }

    /**
     * 设置表别名
     * @param string $alias
     */
    public static function setAlias(string $alias): void
    {
        // TODO: Implement setAlias() method.
        self::$alias = strlen($alias) ? $alias.'.' : '';
    }

    /**
     * 管理员列表
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
        $model = $model->select(self::$message);
        $model = $model->offset($offset);
        $model = $model->limit($limit);
        $list = $model->get();
        $list = is_null($list) ? [] : $list->toArray();
        return $list;
    }

    public static function count(array $where): int
    {
        // TODO: Implement count() method.
        return self::listWhere($where)->isDel(0)->count();
    }

    /**
     * 管理员添加
     * @param array $data
     * @return bool
     */
    public static function add(array $data): bool
    {
        // TODO: Implement add() method.
        try{
            return self::insert($data);
        }catch (\Exception $exception){
            return false;
        }
    }

    public static function modify(array $data, int $id): bool
    {
        // TODO: Implement modify() method.
    }

    public static function recycle(int $id): bool
    {
        // TODO: Implement recycle() method.
    }

    /**
     * 管理员信息
     * @param int $id
     * @return array
     */
    public static function message(int $id): array
    {
        // TODO: Implement message() method.
        return self::id($id)->select(self::$message)->isDel(0)->first()->toArray();
    }

    /**
     * 验证编号
     * @param int $id
     * @return bool
     */
    public static function checkId(int $id): bool
    {
        // TODO: Implement checkId() method.
        $count = self::id($id)->isDel(0)->count();
        return (bool)$count;
    }

    public static function select(int $id, string $select): string
    {
        // TODO: Implement select() method.
    }

    /**
     * 登陆
     * @param int $id
     * @param int $count
     * @return bool
     */
    public static function login(int $id, int $count): bool
    {
        $result = self::id($id)->update([
            'login_count' => $count,
            'last_time' => time(),
            'last_ip' => app('request')->ip()
        ]);
        return $result === 1;
    }
}