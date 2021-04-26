<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('member_id');
            $table->string('member_name');
            $table->string('member_blood_group')->nullable();            
            $table->integer('member_reg_no')->nullable();
            $table->string('member_nid_no')->unique();
            $table->string('member_email')->unique();;
            $table->string('member_dept')->nullable();
            $table->bigInteger('member_contact');
            // $table->unsignedInteger('user_id');
            // $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('members');
    }
}
