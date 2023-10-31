<?php

use App\Contracts\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HandleFlsSettingsTable extends Migration
{
    public function up()
    {
        // Create Fls Settings Table
        if (!Schema::hasTable('Fls_settings')) {
            Schema::create('Fls_settings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 200)->nullable();
                $table->string('key', 100);
                $table->string('value', 500)->nullable();
                $table->string('group', 100)->nullable();
                $table->timestamps();
                $table->index('id');
                $table->unique('id');
                $table->unique('key');
            });
        }

        // Update Fls Settings Table
        if (Schema::hasTable('Fls_settings') && !Schema::hasColumn('Fls_settings', 'field_type')) {
            Schema::table('Fls_settings', function (Blueprint $table) {
                $table->string('default', 250)->nullable()->after('value');
                $table->string('field_type', 50)->nullable()->after('group');
                $table->text('options')->nullable()->after('field_type');
                $table->string('desc', 250)->nullable()->after('options');
                $table->string('order', 6)->nullable()->after('desc');
            });
        }

        // Update Settings (Airlines and Tools)
        if (Schema::hasTable('Fls_settings')) {
            // Fls Airlines settings
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'dairlines.acstate_control'],
                ['key' => 'FlsModule.acstate_control', 'group' => 'Aircraft', 'name' => 'Aircraft State Control', 'default' => 'false', 'field_type' => 'check', 'order' => '1001']
            );
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'dairlines.discord_pirepmsg'],
                ['key' => 'FlsModule.discord_pirepmsg', 'group' => 'Discord', 'name' => 'Pirep Filed Message', 'default' => 'false', 'field_type' => 'check', 'order' => '2001']
            );
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'dairlines.discord_pirep_msgposter'],
                ['key' => 'FlsModule.discord_pirep_msgposter', 'group' => 'Discord', 'name' => 'Message Poster', 'default' => config('app.name'), 'order' => '2002']
            );
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'dairlines.discord_pirep_webhook'],
                ['key' => 'FlsModule.discord_pirep_webhook', 'group' => 'Discord', 'name' => 'Webhook URL (Pirep)', 'order' => '2003']
            );
            // WhazzUp Widget (IVAO)
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'dtools.whazzup_ivao_fieldname'],
                ['key' => 'FlsModule.whazzup_ivao_fieldname', 'group' => 'IVAO', 'name' => 'IVAO ID Field Name', 'default' => 'IVAO', 'order' => '1011']
            );
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'dtools.whazzup_ivao_refresh'],
                ['key' => 'FlsModule.whazzup_ivao_refresh', 'group' => 'IVAO', 'name' => 'Data Refresh Rate (secs)', 'field_type' => 'numeric', 'default' => '60', 'order' => '1012']
            );
            // WhazzUp Widget (VATSIM)
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'dtools.whazzup_vatsim_fieldname'],
                ['key' => 'FlsModule.whazzup_vatsim_fieldname', 'group' => 'VATSIM', 'name' => 'VATSIM CID Field Name', 'default' => 'VATSIM', 'order' => '1021']
            );
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'dtools.whazzup_vatsim_refresh'],
                ['key' => 'FlsModule.whazzup_vatsim_refresh', 'group' => 'VATSIM', 'name' => 'Data Refresh Rate (secs)', 'field_type' => 'numeric', 'default' => '60', 'order' => '1022']
            );
        }
    }
}
