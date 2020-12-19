<?php namespace Kloos\Notify\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePostablesTable extends Migration
{
    public function up()
    {
        Schema::create('kloos_notify_postables', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('post_id');
            $table->integer('postable_id');
            $table->string('postable_type');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kloos_notify_postables');
    }
}
