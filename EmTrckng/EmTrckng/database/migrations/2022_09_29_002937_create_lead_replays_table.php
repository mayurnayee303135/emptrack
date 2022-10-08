<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadReplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_replays', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lead_id')->default(0)->nullable();
            $table->text('comment')->nullable();
            $table->text('attachment')->nullable();
            $table->timestamps();
            $table->integer('created_by')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_replays');
    }
}
