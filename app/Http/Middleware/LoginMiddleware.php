<?php
/**
 * @author: cc_forever<1253705861@qq.com>
 * @day: 2020/7/20
 */
namespace App\Http\Middleware;

use App\CcForever\extend\JsonExtend;
use App\CcForever\extend\LoginExtend;
use App\CcForever\extend\PRedisExtend;
use App\Repositories\AdminsRepository;
use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * 登陆中间件
 * Class LoginMiddleware
 * @package App\Http\Middleware
 */
class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $id = auth('login')->id();  // 当前登录管理员编号
            if(is_null($id)){ return JsonExtend::login('请先登陆'); } // 编号不存在重新登陆
            $role = auth('login')->parseToken()->getClaim('role');// 获取登录管理员规则
            if(is_null($role)){ return JsonExtend::login('请先登陆'); }// 规则不存在时重新登陆
            $adminsRepository = new AdminsRepository(); // 实例化AdminsRepository类
            if($role !== $adminsRepository::loginRole()){ return JsonExtend::error(power_message()); } // 规则不符 没有权限访问
            $path = app('request')->path(); // 获取当前请求的路由
            $route = app('request')->route()->getPrefix(); // 获取路由前缀
            $api = str_replace($route, '', $path); // 接口 对应菜单表的url字段
            $bool = LoginExtend::admin($id, $api); // 获取管理员是否有权限
            if(!$bool){ return JsonExtend::error($adminsRepository::returnMsg(power_message())); } // 没有权限访问
            return $next($request);
        } catch (JWTException $e) { return JsonExtend::error('请先登录'); }
    }
}
