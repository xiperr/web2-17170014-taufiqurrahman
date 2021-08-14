<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\MessageBag;
class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('description');
            $table->enum('time_unit',['day','week','month','year'])->default('day');
            $table->date('due_date');
            $table->dateTime('confirmation_time')->nullable(); //tidak wajib diisi
            $table->integer('d_day');
            //$table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->integer('created_by')->nullable();

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
        Schema::dropIfExists('reminders');
    }
}
