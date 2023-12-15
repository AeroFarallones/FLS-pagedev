<?php

use App\Contracts\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HandleFlsRandomFlightsTable extends Migration
{
    public function up()
    {
        // Create Fls Random Flight table
        if (!Schema::hasTable('Fls_randomflight') && !Schema::hasTable('Fls_random_flights')) {
            Schema::create('Fls_randomflight', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->nullable();
                $table->string('airport_id', 5)->nullable();
                $table->string('flight_id', 150)->nullable();
                $table->string('pirep_id', 150)->nullable();
                $table->date('assign_date')->nullable();
                $table->timestamps();
                $table->index('id');
                $table->unique('id');
            });
        }

        // Update Fls Random Flight table
        if (Schema::hasTable('Fls_randomflight') && !Schema::hasTable('Fls_random_flights') && !Schema::hasColumn('Fls_randomflight', 'pirep_id')) {
            Schema::table('Fls_randomflight', function (Blueprint $table) {
                $table->string('flight_id', 150)->nullable()->change();
                $table->string('pirep_id', 150)->nullable()->after('flight_id');
            });
        }

        // Rename to Fls Random Flights
        if (Schema::hasTable('Fls_randomflight') && !Schema::hasTable('Fls_random_flights')) {
            Schema::table('Fls_randomflight', function (Blueprint $table) {
                $table->dropIndex(['id']);
                $table->dropUnique(['id']);
            });

            Schema::rename('Fls_randomflight', 'Fls_random_flights');

            Schema::table('Fls_random_flights', function (Blueprint $table) {
                $table->index('id');
                $table->unique('id');
            });
        }
    }
}
