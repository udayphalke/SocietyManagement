<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberrecords', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('vehicle_no')->unique();
            $table->string('entry_date');
            $table->string('entry_time');
            $table->string('exit_date');
            $table->string('exit_time');
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
        Schema::dropIfExists('memberrecords');
    }
}
