<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->float('area')->nullable()->comment('面积');
            $table->float('unit_price')->nullable();
            $table->float('price')->nullable();
            $table->string('room_count')->nullable()->comment('几室几厅');
            $table->string('direction')->nullable()->comment('朝向');
            $table->string('community')->nullable()->comment('隶属小区');
            $table->text('image')->nullable();
            $table->unsignedInteger('visiting_count')->nullable();
            $table->integer('floor')->nullable()->comment('楼层');
            $table->integer('max_floor')->nullable()->comment('最大楼层');
            $table->integer('contact_name')->nullable()->comment('联系人');
            $table->integer('contact_phone')->nullable()->comment('联系电话');
            $table->string('decoration')->nullable()->comment('装修状态');
            $table->string('age')->nullable()->comment('楼龄');
            $table->dateTime('official_limit')->nullable()->comment('产权年限至');
            $table->string('heat_supply')->nullable()->comment('供暖');
            $table->string('elevator')->nullable()->comment('电梯');
            $table->longText('detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house');
    }
}
