<?php

/*
 * This file is part of ibrand/order.
 *
 * (c) iBrand <https://www.ibrand.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibrand_pay_charge', function (Blueprint $table) {
            $table->increments('id');
            $table->string('charge_id')->unique();
            $table->string('app');   //具体支付配置
            $table->string('type');  //业务类型
            $table->boolean('paid')->default(false);
            $table->boolean('refunded')->default(false);
            $table->boolean('reversed')->default(false);
            $table->string('channel');
            $table->string('order_no');
            $table->string('out_trade_no')->nullable();
            $table->string('client_ip')->default('127.0.0.1');
            $table->integer('amount');
            $table->string('currency')->default('cny');
            $table->string('subject');
            $table->string('body');
            $table->string('extra')->nullable();
            $table->timestamp('time_paid')->nullable();
            $table->timestamp('time_expire')->nullable();
            $table->string('transaction_no')->nullable();
            $table->text('transaction_meta')->nullable();
            $table->text('metadata')->nullable();
            $table->text('credential')->nullable();
            $table->text('description')->nullable();
            $table->string('failure_code')->nullable();
            $table->text('failure_msg')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('order_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ibrand_pay_charge');
    }
}
