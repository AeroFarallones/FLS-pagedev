<?php

use App\Contracts\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlsSapReportsTable extends Migration
{
    public function up()
    {
        // Create Stable Approach Plugin (sap) Reports Table
        if (!Schema::hasTable('Fls_sap_reports')) {
            Schema::create('Fls_sap_reports', function (Blueprint $table) {
                $table->increments('id');
                $table->string('sap_analysisID', 100);
                $table->string('sap_userID', 100);
                $table->unsignedInteger('user_id');
                $table->string('pirep_id')->nullable();
                $table->boolean('is_stable')->nullable()->default(false);
                $table->mediumText('raw_report');
                $table->timestamps();
                $table->index('id');
                $table->unique('id');
            });
        }

        // Add Settings related to Stable Approach Plugin
        if (Schema::hasTable('Fls_settings')) {
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'FlsModule.stable_app_control'],
                ['group' => 'Stable Approach', 'name' => 'Receive Reports', 'default' => 'false', 'field_type' => 'check', 'order' => '7001']
            );
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'FlsModule.stable_app_field'],
                ['group' => 'Stable Approach', 'name' => 'User Field Name', 'default' => 'Stable Approach ID', 'order' => '7002']
            );
        }
    }
}
