<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		Schema::create('users', function (Blueprint $table)
		{
			$table->increments('id');
			$table->uuid('uuid')->unique();
			$table->string('pseudo');
			$table->string('email');
			$table->string('password');
			$table->string('securityQuestion');
			$table->string('securityAnswer');
			$table->string('trafficSource');
			$table->Integer('trend')->default(0);
			$table->string('profilePicture')->default('https://via.placeholder.com/200x200');
			$table->Integer('permission')->default(0);
			$table->boolean('status')->default(0);
			$table->string('country')->default('');
			$table->boolean('countryDisplay')->default(1);
			$table->timestamp('birthDate')->nullable();
			$table->boolean('birthDateDisplay')->default(1);
			$table->string('achievements')->default('');

			$table->string('biography')->default('');
			$table->string('twitterTag')->default('@');
			$table->string('instagramToken')->default('');
			$table->string('discordToken')->default('');
			$table->string('twitchToken')->default('');
			$table->string('spotifyToken')->default('');
			$table->string('steamToken')->default('');
			$table->string('minecraftUsername')->default('');
			$table->string('connections')->default(0);
	
			$table->Integer('state')->default(0);
			$table->timestampTz('lastConnection')->nullable();
			$table->rememberToken();
			$table->timestampsTZ();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
