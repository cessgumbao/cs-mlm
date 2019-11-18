<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('distributor_id')->unsigned()->index()->nullable();
            $table->bigInteger('member_id')->unsigned()->index()->nullable();
            $table->decimal('total_amount', 12, 2)->nullable();
            $table->decimal('net_amount', 12, 2)->nullable();
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
        Schema::dropIfExists('member_purchases');
    }
}
