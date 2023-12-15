<?php

use App\Contracts\Migration;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up()
    {
        // Add New Settings for Auto Reject
        if (Schema::hasTable('Fls_settings')) {
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'FlsModule.ar_marginpause'],
                ['group' => 'Auto Reject', 'name' => 'Pause Time (mins)', 'field_type' => 'numeric', 'default' => '0', 'order' => '8910']
            );
            DB::table('Fls_settings')->updateOrInsert(
                ['key' => 'FlsModule.ar_margintdiff'],
                ['group' => 'Auto Reject', 'name' => 'Flight Time Diff (mins)', 'field_type' => 'numeric', 'default' => '0', 'order' => '8911']
            );
        }
    }
};
