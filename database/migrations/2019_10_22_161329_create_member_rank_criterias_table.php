<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberRankCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_rank_criterias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('member_rank_id')->unsigned()->index()->nullable();
            $table->bigInteger('role_id')->unsigned()->index()->nullable();
            $table->integer('ecash_reward')->nullable();
            $table->decimal('min_sales_requirement', 12, 2)->nullable();
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
        Schema::dropIfExists('member_rank_criterias');
    }
}
