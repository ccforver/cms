<?php
/**
 * @author: cc_forever<1253705861@qq.com>
 * @day: 2020/8/3
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 信息标签表
 *
 * Class CreateMessagesTagsTable
 */
class CreateMessagesTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_tags', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // 表存储引擎
            $table->charset = 'utf8';  //表默认字符集
            $table->collation = 'utf8_general_ci';  // 表默认的排序规则
            $table->bigIncrements('id')->comment('信息标签表');
            $table->integer('tag_id')->comment('标签表编号');
            $table->char('unique', 32)->comment('信息标签唯一值');
            $table->integer('add_time')->comment('信息标签添加时间');
            $table->integer('clear_time')->comment('信息标签清除时间');
            $table->tinyInteger('is_del')->comment('是否删除 1 是 0 否');
            $table->unique('id'); // 编号唯一索引
            $table->index('unique'); // 标签名称普通索引
            $table->index('tag_id'); // 标签状态普通索引
            $table->index('is_del'); // 是否删除普通索引
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages_tags');
    }
}
