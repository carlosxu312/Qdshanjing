<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->default('')->nullable($value = false)->comment('姓名');
            $table->string('content', 500)->default('')->nullable($value = false)->comment('内容');
            $table->unsignedInteger('create_time')->default(0)->nullable($value = false)->comment('创建时间');
            $table->unsignedInteger('update_time')->default(0)->nullable($value = false)->comment('更新时间');
            $table->charset   = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message');
    }
}
