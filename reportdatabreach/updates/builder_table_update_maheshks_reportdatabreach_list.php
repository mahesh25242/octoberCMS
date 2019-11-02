<?php namespace MaheshKS\ReportDataBreach\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMaheshksReportdatabreachList extends Migration
{
    public function up()
    {
        Schema::table('maheshks_reportdatabreach_list', function($table)
        {
            $table->string('date_of_breach', 255);
            $table->string('no_record_breach', 255);
            $table->string('web_site_ref_url', 255);
            $table->string('source_of_breach', 255);
            $table->string('type_of_breach', 255);
            $table->text('comments');
            $table->renameColumn('name', 'organization');
        });
    }
    
    public function down()
    {
        Schema::table('maheshks_reportdatabreach_list', function($table)
        {
            $table->dropColumn('date_of_breach');
            $table->dropColumn('no_record_breach');
            $table->dropColumn('web_site_ref_url');
            $table->dropColumn('source_of_breach');
            $table->dropColumn('type_of_breach');
            $table->dropColumn('comments');
            $table->renameColumn('organization', 'name');
        });
    }
}
