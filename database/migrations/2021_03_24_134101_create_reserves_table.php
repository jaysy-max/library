<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->nullable()->unsigned();
            $table->string('reserve_book_name');
            $table->string('reserve_book_category');
            $table->string('reserve_user_name');
            $table->string('stud_id');
            $table->string('reserve_user_email'); 
            $table->date('date_of_reservation');
            $table->integer('status');
            $table->foreign('member_id')->references('member_id')->on('members');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserves');
    }
}
