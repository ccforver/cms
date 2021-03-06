<?php
/**
 * @author: cc_forever<1253705861@qq.com>
 * @day: 2020/8/4
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 配置信息表
 *
 * Class CreateConfigMessageTable
 */
class CreateConfigMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_message', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // 表存储引擎
            $table->charset = 'utf8';  //表默认字符集
            $table->collation = 'utf8_general_ci';  // 表默认的排序规则
            $table->bigIncrements('id')->comment('配置信息表');
            $table->string('name', 128)->comment('配置信息名称');
            $table->string('description', 256)->comment('配置信息描述');
            $table->char('select', 32)->comment('配置信息唯一值');
            $table->tinyInteger('type')->comment('配置信息类型 (1 文本框 2 单选 3 多选 4 图片 5 多行文本框)');
            $table->string('type_value', 256)->comment('配置信息类型值(单选/多选 格式 field:value|field:value|field:value|field:value...)');
            $table->text('value')->comment('配置信息值');
            $table->integer('category_id')->comment('配置分类编号');
            $table->integer('add_time')->comment('配置信息添加时间');
            $table->tinyInteger('is_del')->comment('是否删除(1是 0否)');
            $table->unique('id'); // 编号唯一索引
            $table->unique('select'); // 唯一值唯一索引
            $table->index('category_id'); // 配置分类编号普通索引
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
        Schema::dropIfExists('config_message');
    }
}
