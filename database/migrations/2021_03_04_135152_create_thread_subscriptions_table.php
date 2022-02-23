<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('thread_id');

            $table->timestamps();

//            $table->primary(['user_id', 'thread_id']);

            //            表加上了唯一性索引，
            $table->unique(['user_id','thread_id']);


            //外键约束？？？
            $table->foreign('thread_id')
                ->references('id')
                ->on('threads')

//                ????????? cascade是啥
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thread_subscriptions');
    }
}
