<?php

use App\Contracts\Migration;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up()
    {
        // Add New Settings for WhazzUp Checks (Network Presence)
        if (Schema::hasTable('Fls_settings')) {
            // Delete Old Setting
            DB::table('Fls_settings')->where('key', 'FlsModule.networkcheck_fieldname')->delete();
            // Add New Settings
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'FlsModule.networkcheck_fieldname_ivao'],
                ['group' => 'Network Checks', 'name' => 'User Field Name (IVAO)', 'default' => 'IVAO ID', 'order' => '8811']
            );
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'FlsModule.networkcheck_fieldname_vatsim'],
                ['group' => 'Network Checks', 'name' => 'User Field Name (VATSIM)', 'default' => 'VATSIM ID', 'order' => '8812']
            );
            // Update Order and Options
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'FlsModule.networkcheck'],
                ['group' => 'Network Checks', 'name' => 'Check Network Presence', 'field_type' => 'check', 'default' => 'false', 'order' => '8801']
            );
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'FlsModule.networkcheck_callsign'],
                ['group' => 'Network Checks', 'name' => 'Check Network Callsign', 'field_type' => 'check', 'default' => 'false', 'order' => '8802']
            );
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'FlsModule.networkcheck_server'],
                ['group' => 'Network Checks', 'name' => 'Server Selection', 'field_type' => 'select', 'options' => 'IVAO,VATSIM,AUTO', 'default' => 'AUTO', 'order' => '8803']
            );
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'FlsModule.networkcheck_margin'],
                ['group' => 'Network Checks', 'name' => 'Validity Percentage', 'field_type' => 'numeric', 'default' => '80', 'order' => '8821']
            );
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'FlsModule.networkcheck_cleanup'],
                ['group' => 'Network Checks', 'name' => 'Hours to Cleanup Check Data', 'field_type' => 'numeric', 'default' => '48', 'order' => '8822']
            );
        }
    }
};
