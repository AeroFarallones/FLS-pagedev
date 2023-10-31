<?php

use App\Contracts\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlsDiscordTable extends Migration
{
    public function up()
    {
        // Create Fls Discord Widget Table
        if (!Schema::hasTable('Fls_discord')) {
            Schema::create('Fls_discord', function (Blueprint $table) {
                $table->increments('id');
                $table->string('server_id', 100)->nullable();
                $table->mediumText('rawdata')->nullable();
                $table->timestamps();
                $table->index('id');
                $table->unique('id');
            });
        }
    }
}
