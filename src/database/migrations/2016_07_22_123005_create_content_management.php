<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateContentManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->string('createdby');
            $table->timestamps();

            $table->primary('id');
        });
        Schema::create('content_page_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content_id');
            $table->string('role_id');
            $table->timestamps();

            $table->foreign('content_id')
                ->references('id')
                ->on('content_pages')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('content_pages');
        Schema::drop('content_page_roles');
    }
}
?>