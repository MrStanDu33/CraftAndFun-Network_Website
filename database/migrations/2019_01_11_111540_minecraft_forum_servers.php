<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MinecraftForumServers extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('minecraft_forum_servers', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('image')->default('/img/command_block.png');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('minecraft_forum_servers');
	}
}
