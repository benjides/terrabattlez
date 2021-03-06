<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('characters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('savename')->unique();
			$table->string('description');
			$table->string('class',2);
			$table->boolean('pot');
			$table->boolean('pof');
			$table->string('race');
			$table->boolean('adventurer');
			$table->integer('recode_id')->nullable()->unsigned();
			$table->timestamps();
		});

		Schema::table('characters', function(Blueprint $table) {
			//$table->foreign('recode_id')->references('id')->on('characters');
			$table->foreign('race')->references('race')->on('races');
			$table->foreign('class')->references('class')->on('char_classes');
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('characters');
	}

}
