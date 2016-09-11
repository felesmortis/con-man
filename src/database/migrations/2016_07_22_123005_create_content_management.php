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
            $table->bigIncrements('content_id');
            $table->string('title', 255);
            $table->longText('content');
            $table->string('createdby');
            $table->bigInteger('views')->unsigned();
            $table->timestamps();
        });
        Schema::create('content_page_roles', function (Blueprint $table) {
            $table->bigIncrements('content_role_id');
            $table->bigInteger('content_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->timestamps();

            $table->foreign('content_id')
                ->references('content_id')
                ->on('content_pages')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });
        Schema::create('content_page_alliances', function (Blueprint $table){
            $table->bigIncrements('content_alliance_id');
            $table->bigInteger('content_id')->unsigned();
            $table->integer('alliance_id');
            $table->timestamps();

            $table->foreign('content_id')
                ->references('content_id')
                ->on('content_pages')
                ->onDelete('cascade');

            $table->foreign('alliance_id')
                ->references('allianceID')
                ->on('eve_alliance_lists')
                ->onDelete('cascade');
        });
        Schema::create('content_page_corporations', function (Blueprint $table){
            $table->bigIncrements('content_corp_id');
            $table->bigInteger('content_id')->unsigned();
            $table->timestamps();

            $table->foreign('content_id')
                ->references('content_id')
                ->on('content_pages')
                ->onDelete('cascade');

            $table->foreign('corporation_id')
                ->references('corporationID')
                ->on('corporation_sheets')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::drop('content_page_roles');
        Schema::drop('content_pages');
        Schema::drop('content_page_alliances');
        Schema::drop('content_page_corporations');
    }
}
?>