<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_visit_id')->default(0)->nullable();
            $table->string('name');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->string('operated_by')->nullable();
            $table->bigInteger('industry')->default(0)->nullable();
            $table->string('contact_person')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('decision_maker')->nullable();
            $table->bigInteger('contact_no')->default(0)->nullable();
            $table->string('email')->nullable();
            $table->string('customer_code')->nullable();
            $table->string('date_of_visit')->nullable();
            $table->string('next_follow_update')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
            $table->bigInteger('created_by')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
