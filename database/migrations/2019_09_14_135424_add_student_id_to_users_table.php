<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStudentIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickName');//微信昵称
            $table->string('openid',64);//微信openid
            $table->tinyInteger('sex')->default(0);         //性别
            $table->string('phone',96);       //手机号码
            $table->string('student_id',96)->unique();       //学号
            $table->string('college',96); //学院
            $table->string('grade',96);       //年级
            $table->string('class',96);    //专业班级
            $table->string('dormitory',64);//宿舍号
            $table->dropColumn('email');//邮箱删除
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
