<?php namespace MaheshKS\ContactUs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMaheshksContactusItem extends Migration
{
    public function up()
    {
        Schema::create('maheshks_contactus_item', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('phone', 255);
            $table->text('comments');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('maheshks_contactus_item');
    }
}
