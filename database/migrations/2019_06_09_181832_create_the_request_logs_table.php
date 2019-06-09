<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheRequestLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('the_request_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('start_micro_time', 10);
            $table->string('end_micro_time', 10);
            $table->dateTime('started_at');
            $table->dateTime('returned_at');
            $table->ipAddress('ip_address');
            $table->longText('url');
            $table->string('method');
            $table->longText('input');
            $table->longText('output');
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
        Schema::dropIfExists('the_request_logs');
    }
}
