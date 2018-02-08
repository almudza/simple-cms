<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_role', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('admin_id');
            $table->integer('role_id');
            /*
            // set PK 
            $table->primary(['admin_id', 'role_id']);

            // set FK admin
            $table->foreign('admin_id')
                    ->references('id')
                    ->on('admins')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');


            // set FK role
            $table->foreign('role_id')
                    ->references('id')
                    ->on('roles')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

*/


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
        Schema::dropIfExists('admin_role');
    }
}
