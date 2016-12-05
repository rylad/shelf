<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('players', function (Blueprint $table) {

			# Increments method will make a Primary, Auto-Incrementing field.
			# Most tables start off this way
			$table->increments('id');

			# This generates two columns: `created_at` and `updated_at` to
			# keep track of changes to a row
			$table->timestamps();

			# The rest of the fields...
			$table->string('first');
			$table->string('last');
			$table->string('nick');

			# FYI: We're skipping the 'tags' field for now; more on that later.

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::drop('players');
    }
}
