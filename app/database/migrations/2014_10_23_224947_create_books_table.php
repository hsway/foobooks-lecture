<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function($table) {

			// Set up your primary key and make it auto increement
			$table->increments('id');

			// Creates fields: created_at, updated_at
			$table->timestamps();

			$table->string('author');
			$table->string('title');
			$table->integer('published');
			$table->string('cover');
			$table->string('purchase_link');

		});

		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('books');
	}

}
