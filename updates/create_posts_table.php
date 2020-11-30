<?php namespace Kloos\Notify\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('kloos_notify_posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('text')->nullable();
            $table->string('action_link')->nullable();
            $table->string('author')->nullable();
            $table->integer('user_id')->nullable();

            $table->text('extras');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kloos_notify_posts');
    }
}
