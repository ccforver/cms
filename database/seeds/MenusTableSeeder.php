<?php
/**
 * @author: cc_forever<1253705861@qq.com>
 * @day: 2020/7/23
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * 菜单默认数据
 * Class MenusTableSeeder
 */
class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'id' => 1,
                'name' => '系统管理',
                'parent_id' => 0,
                'routes' => '/systems',
                'page' => '/system',
                'icon' => 'nested',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 2,
                'name' => '管理员列表',
                'parent_id' => 1,
                'routes' => '/admins/list',
                'page' => '/admins',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 3,
            ],
            [
                'id' => 3,
                'name' => '菜单列表',
                'parent_id' => 1,
                'routes' => '/menus/list',
                'page' => '/menus',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 2,
            ],
            [
                'id' => 4,
                'name' => '规则列表',
                'parent_id' => 1,
                'routes' => '/rules/list',
                'page' => '/rules',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 5,
                'name' => '管理员添加',
                'parent_id' => 1,
                'routes' => '/admins/insert',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 6,
                'name' => '管理员修改',
                'parent_id' => 1,
                'routes' => '/admins/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 7,
                'name' => '管理员删除',
                'parent_id' => 1,
                'routes' => '/admins/delete',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 8,
                'name' => '管理员信息',
                'parent_id' => 1,
                'routes' => '/admins/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 9,
                'name' => '菜单添加',
                'parent_id' => 1,
                'routes' => '/menus/insert',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 10,
                'name' => '菜单修改',
                'parent_id' => 1,
                'routes' => '/menus/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 11,
                'name' => '菜单删除',
                'parent_id' => 1,
                'routes' => '/menus/delete',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 12,
                'name' => '菜单信息',
                'parent_id' => 1,
                'routes' => '/menus/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 13,
                'name' => '规则添加',
                'parent_id' => 1,
                'routes' => '/rules/insert',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 14,
                'name' => '规则修改',
                'parent_id' => 1,
                'routes' => '/rules/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 15,
                'name' => '规则删除',
                'parent_id' => 1,
                'routes' => '/rules/delete',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 16,
                'name' => '规则信息',
                'parent_id' => 1,
                'routes' => '/rules/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 17,
                'name' => '内容管理',
                'parent_id' => 0,
                'routes' => '/contents',
                'page' => '/content',
                'icon' => 'table',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 10,
            ],
            [
                'id' => 18,
                'name' => '栏目列表',
                'parent_id' => 17,
                'routes' => '/columns/list',
                'page' => '/columns',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 3,
            ],
            [
                'id' => 19,
                'name' => '信息列表',
                'parent_id' => 17,
                'routes' => '/messages/list',
                'page' => '/messages',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 2,
            ],
            [
                'id' => 20,
                'name' => '标签列表',
                'parent_id' => 17,
                'routes' => '/tags/list',
                'page' => '/tags',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 21,
                'name' => '栏目添加',
                'parent_id' => 17,
                'routes' => '/columns/insert',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 22,
                'name' => '栏目修改',
                'parent_id' => 17,
                'routes' => '/columns/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 23,
                'name' => '栏目删除',
                'parent_id' => 17,
                'routes' => '/columns/delete',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 24,
                'name' => '栏目信息',
                'parent_id' => 17,
                'routes' => '/columns/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 25,
                'name' => '栏目内容添加/修改/查询',
                'parent_id' => 17,
                'routes' => '/columns/content',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 26,
                'name' => '信息添加',
                'parent_id' => 17,
                'routes' => '/messages/insert',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 27,
                'name' => '信息修改',
                'parent_id' => 17,
                'routes' => '/messages/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 28,
                'name' => '信息删除',
                'parent_id' => 17,
                'routes' => '/messages/delete',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 29,
                'name' => '信息信息',
                'parent_id' => 17,
                'routes' => '/messages/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 30,
                'name' => '信息内容添加/修改/查询',
                'parent_id' => 17,
                'routes' => '/messages/content',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 31,
                'name' => '信息点击量',
                'parent_id' => 17,
                'routes' => '/messages/click',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 32,
                'name' => '信息状态修改',
                'parent_id' => 17,
                'routes' => '/messages/state',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 33,
                'name' => '标签添加',
                'parent_id' => 17,
                'routes' => '/tags/insert',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 34,
                'name' => '标签修改',
                'parent_id' => 17,
                'routes' => '/tags/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 35,
                'name' => '标签删除',
                'parent_id' => 17,
                'routes' => '/tags/delete',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 36,
                'name' => '标签信息',
                'parent_id' => 17,
                'routes' => '/tags/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 37,
                'name' => '规则菜单',
                'parent_id' => 1,
                'routes' => '/rules/menus',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 38,
                'name' => '栏目视图',
                'parent_id' => 17,
                'routes' => '/columns/views',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 39,
                'name' => '信息视图',
                'parent_id' => 17,
                'routes' => '/messages/views',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 40,
                'name' => '信息标签',
                'parent_id' => 17,
                'routes' => '/messages/tags',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 41,
                'name' => '视图列表',
                'parent_id' => 17,
                'routes' => '/views/list',
                'page' => '/views',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 42,
                'name' => '视图添加',
                'parent_id' => 17,
                'routes' => '/views/insert',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 43,
                'name' => '视图修改',
                'parent_id' => 17,
                'routes' => '/views/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 44,
                'name' => '视图删除',
                'parent_id' => 17,
                'routes' => '/views/delete',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 45,
                'name' => '视图信息',
                'parent_id' => 17,
                'routes' => '/views/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 46,
                'name' => '配置管理',
                'parent_id' => 0,
                'routes' => '/configs',
                'page' => '/config',
                'icon' => 'form',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 47,
                'name' => '分类列表',
                'parent_id' => 46,
                'routes' => '/config/category/list',
                'page' => '/configcategory',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 48,
                'name' => '分类添加',
                'parent_id' => 46,
                'routes' => '/config/category/insert',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 49,
                'name' => '分类修改',
                'parent_id' => 46,
                'routes' => '/config/category/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 50,
                'name' => '分类删除',
                'parent_id' => 46,
                'routes' => '/config/category/delete',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 51,
                'name' => '分类信息',
                'parent_id' => 46,
                'routes' => '/config/category/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 52,
                'name' => '分类列表(all)',
                'parent_id' => 46,
                'routes' => '/config/category/category',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 53,
                'name' => '配置列表',
                'parent_id' => 46,
                'routes' => '/config/message/list',
                'page' => '/configmessage',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 54,
                'name' => '配置添加',
                'parent_id' => 46,
                'routes' => '/config/message/insert',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 55,
                'name' => '配置修改',
                'parent_id' => 46,
                'routes' => '/config/message/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 56,
                'name' => '配置删除',
                'parent_id' => 46,
                'routes' => '/config/message/delete',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 57,
                'name' => '配置信息',
                'parent_id' => 46,
                'routes' => '/config/message/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 58,
                'name' => '营销管理',
                'parent_id' => 0,
                'routes' => '/markets',
                'page' => '/market',
                'icon' => 'eye',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 59,
                'name' => '轮播列表',
                'parent_id' => 58,
                'routes' => '/banners/list',
                'page' => '/banners',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 60,
                'name' => '轮播添加',
                'parent_id' => 58,
                'routes' => '/banners/insert',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 61,
                'name' => '轮播修改',
                'parent_id' => 58,
                'routes' => '/banners/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 62,
                'name' => '轮播删除',
                'parent_id' => 58,
                'routes' => '/banners/delete',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 63,
                'name' => '轮播信息',
                'parent_id' => 58,
                'routes' => '/banners/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 64,
                'name' => '轮播图',
                'parent_id' => 58,
                'routes' => '/banners/banners',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 65,
                'name' => '留言列表',
                'parent_id' => 58,
                'routes' => '/chats/list',
                'page' => '/chats',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 66,
                'name' => '留言用户列表',
                'parent_id' => 58,
                'routes' => '/chats/users',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 67,
                'name' => '留言客服和用户对话列表',
                'parent_id' => 58,
                'routes' => '/chats/chats',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 68,
                'name' => '留言状态',
                'parent_id' => 58,
                'routes' => '/chats/see',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 69,
                'name' => 'seo管理',
                'parent_id' => 0,
                'routes' => '/seo',
                'page' => '/seo',
                'icon' => 'eye-open',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 70,
                'name' => '友链列表',
                'parent_id' => 69,
                'routes' => '/links/list',
                'page' => '/links',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 71,
                'name' => '友链添加',
                'parent_id' => 69,
                'routes' => '/links/insert',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 72,
                'name' => '友链修改',
                'parent_id' => 69,
                'routes' => '/links/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 73,
                'name' => '友链删除',
                'parent_id' => 69,
                'routes' => '/links/delete',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 74,
                'name' => '友链信息',
                'parent_id' => 69,
                'routes' => '/links/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 75,
                'name' => '合作伙伴',
                'parent_id' => 69,
                'routes' => '/partners/list',
                'page' => '/partners',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 76,
                'name' => '合作伙伴添加',
                'parent_id' => 69,
                'routes' => '/partners/insert',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 77,
                'name' => '合作伙伴修改',
                'parent_id' => 69,
                'routes' => '/partners/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 78,
                'name' => '合作伙伴删除',
                'parent_id' => 69,
                'routes' => '/partners/delete',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 79,
                'name' => '合作伙伴信息',
                'parent_id' => 69,
                'routes' => '/partners/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 80,
                'name' => '规则列表信息',
                'parent_id' => 1,
                'routes' => '/rules/rules',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 81,
                'name' => '配置信息(单个)',
                'parent_id' => 46,
                'routes' => '/config/message/config',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 82,
                'name' => '栏目列表(全部)',
                'parent_id' => 17,
                'routes' => '/columns/columns',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 83,
                'name' => '标签列表(全部)',
                'parent_id' => 17,
                'routes' => '/tags/tags',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 84,
                'name' => '缓存列表',
                'parent_id' => 69,
                'routes' => '/cache/list',
                'page' => '/cache',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 85,
                'name' => '缓存首页',
                'parent_id' => 69,
                'routes' => '/cache/index',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 86,
                'name' => '缓存栏目',
                'parent_id' => 69,
                'routes' => '/cache/columns',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 87,
                'name' => '缓存信息',
                'parent_id' => 69,
                'routes' => '/cache/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 88,
                'name' => 'Robots',
                'parent_id' => 69,
                'routes' => '/robots/content',
                'page' => '/robots',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 89,
                'name' => 'Robots修改',
                'parent_id' => 69,
                'routes' => '/robots/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 90,
                'name' => '网站链接',
                'parent_id' => 69,
                'routes' => '/sitemap/index',
                'page' => '/sitemap',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 91,
                'name' => '网站链接html',
                'parent_id' => 69,
                'routes' => '/sitemap/html',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 92,
                'name' => '网站链接xml',
                'parent_id' => 69,
                'routes' => '/sitemap/xml',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 93,
                'name' => '网站链接txt',
                'parent_id' => 69,
                'routes' => '/sitemap/txt',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 94,
                'name' => '分站列表',
                'parent_id' => 69,
                'routes' => '/substations/list',
                'page' => '/substations',
                'icon' => '',
                'menu' => 1,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 95,
                'name' => '分站添加',
                'parent_id' => 69,
                'routes' => '/substations/insert',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 96,
                'name' => '分站修改',
                'parent_id' => 69,
                'routes' => '/substations/update',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 97,
                'name' => '分站删除',
                'parent_id' => 69,
                'routes' => '/substations/delete',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ],
            [
                'id' => 98,
                'name' => '分站信息',
                'parent_id' => 69,
                'routes' => '/substations/message',
                'page' => '',
                'icon' => '',
                'menu' => 0,
                'is_del' => 0,
                'add_time' => time(),
                'sort' => 1,
            ]
        ]);
    }
}
