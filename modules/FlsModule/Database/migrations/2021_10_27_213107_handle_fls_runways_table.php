<?php

use App\Contracts\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HandleFlsRunwaysTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('turksim_runways')) {
            // Drop indexes for MariaDB compatibility
            Schema::table('turksim_runways', function (Blueprint $table) {
                $table->dropIndex(['id']);
                $table->dropUnique(['id']);
            });

            // Rename table
            Schema::rename('turksim_runways', 'Fls_runways');

            // Add indexes Back
            Schema::table('Fls_runways', function (Blueprint $table) {
                $table->index('id');
                $table->unique('id');
            });
        }

        if (!Schema::hasTable('Fls_runways')) {
            // Create Fls Runways table
            Schema::create('Fls_runways', function (Blueprint $table) {
                $table->increments('id');
                $table->string('airport', 5);
                $table->string('runway_ident', 3);
                $table->string('lat', 12);
                $table->string('lon', 12);
                $table->string('heading', 3);
                $table->string('lenght', 5);
                $table->string('ils_freq', 7)->nullable();
                $table->string('loc_course', 3)->nullable();
                $table->string('airac', 4)->nullable();
                $table->timestamps();
                $table->index('id');
                $table->unique('id');
            });
        }

        if (Schema::hasTable('Fls_runways') && Schema::hasColumn('Fls_runways', 'airport')) {
            // Rename airport column
            Schema::table('Fls_runways', function (Blueprint $table) {
                $table->renameColumn('airport', 'airport_id');
            });
        }
    }
}
