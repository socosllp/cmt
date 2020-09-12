<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitRegTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::create('init_reg', function (Blueprint $table) {
            Schema::create('irves', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('age');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->string('country');

            $table->string('home_no');
            $table->string('cell_no');
            $table->string('work_no');
            $table->string('emergency_cntName');
            $table->string('emergency_contNo');
            $table->string('email_id')->unique();;
            $table->string('first_language');
            $table->string('refer_through');
            $table->string('child_program');

            $table->string('after_school_program');
            $table->string('health')->nullable();
            $table->string('employment')->nullable();
            $table->string('staff')->nullable();
            $table->string('neighbourhood_net')->nullable();
            $table->string('others')->nullable();
            $table->string('agent_notes')->nullable();

            $table->string('ques_1');
            $table->string('ques_2');
            $table->string('ques_3');
            $table->string('ques_4');
            $table->string('ques_5');
            $table->string('ques_6');
            $table->string('ques_7');
           
            $table->string('family_doctor');
            $table->string('walkin_clinic');
            $table->string('emergency_room');
            $table->string('hospital');

            $table->string('ques_8');
            $table->string('ques_9');
            $table->string('ques_10');

            $table->string('created_by')->nullable();          
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('irves');
    }
}
