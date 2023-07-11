<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::connection(config('statamic.statamic-public-preview.db_connection'))
            ->create(config('statamic-public-preview.table_name'), function (Blueprint $table) {

                $table->uuid('id');

                $table->string('entry_id');

                $table->dateTime('valid_until');

                $table->timestamps();

                $table->unique(['entry_id'], 'entry');

                $table->unique(['id'], 'lookup');
            });
    }
};
