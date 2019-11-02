<?php namespace MaheshKS\DataBreachStatistics\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMaheshksDatabreachstatisticsItem extends Migration
{
    public function up()
    {
        Schema::create('maheshks_databreachstatistics_item', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->bigInteger('breach_count');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));;
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));;
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('maheshks_databreachstatistics_item');
    }
}
