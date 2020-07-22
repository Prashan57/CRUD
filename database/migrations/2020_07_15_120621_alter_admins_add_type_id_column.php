<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAdminsAddTypeIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("admins",function(Blueprint $table){
        $table->integer("type_id")->unsigned();
        $table->foreign("type_id")->references("id")->on("type")->onDelete("restrict");
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("admins",function (Blueprint $table){
            $table->dropColumn("type_id");
        });
    }
}
