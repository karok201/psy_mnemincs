<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->index();
            $table->string('title');
            $table->text('description');
            $table->boolean('hidden')->default(false);
            $table->integer('price_per_hour');
            $table->integer('course_price');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('services_tags', function (Blueprint $table) {
            $table->foreignId('service_id')->index();
            $table->foreignId('tag_id')->index();

            $table->unique(['service_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
