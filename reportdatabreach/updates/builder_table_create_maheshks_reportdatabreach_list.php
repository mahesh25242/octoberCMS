<?php namespace MaheshKS\ReportDataBreach\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMaheshksReportdatabreachList extends Migration
{
    public function up()
    {
        Schema::create('maheshks_reportdatabreach_list', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('maheshks_reportdatabreach_list');
    }
}
