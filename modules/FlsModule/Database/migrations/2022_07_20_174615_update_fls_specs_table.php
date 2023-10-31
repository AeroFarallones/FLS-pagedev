<?php

use App\Contracts\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFlsSpecsTable extends Migration
{
    public function up()
    {
        // Add new fields for Specs usage
        if (Schema::hasTable('Fls_specs')) {
            Schema::table('Fls_specs', function (Blueprint $table) {
                $table->string('selcal', 4)->nullable()->after('crew');
                $table->string('hexcode', 6)->nullable()->after('selcal');
                $table->string('rvr', 3)->nullable()->after('hexcode');
                $table->string('rmk', 25)->nullable()->after('rvr');
            });
        }
    }
}
