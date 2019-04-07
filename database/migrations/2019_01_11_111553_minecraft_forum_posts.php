<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MinecraftForumPosts extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('minecraft_forum_posts', function (Blueprint $table)
		{
			$table->increments('id');
			$table->Integer('sectionId');
			$table->Integer('postId');
			$table->Integer('creatorId');
			$table->string('name')->default(0);
			$table->longText('content');
			$table->Integer('downvote')->default(0);
			$table->Integer('upvote')->default(0);
			$table->Integer('reports')->default(0);
			$table->boolean('reported')->default(0);
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
		Schema::dropIfExists('minecraft_forum_posts');
	}
}
