<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('title');
            $table->bigInteger('service_group_id');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('keywords');
            $table->string('slug');
            $table->string('icon');
            $table->string('short_description');
            $table->string('div_color', 15)->default('#ffffff');
            $table->longText('description');
            $table->string('right_banner');
            $table->boolean('is_bottom_div_1');
            $table->longText('bottom_div_1');
            $table->boolean('is_bottom_div_button_1');
            $table->string('bottom_div_button_1_text');
            $table->string('bottom_div_button_1_link');
            $table->boolean('is_bottom_div_2');
            $table->longText('bottom_div_2');
            $table->boolean('is_bottom_div_button_2');
            $table->string('bottom_div_button_2_text');
            $table->string('bottom_div_button_2_link');
            $table->timestamps();
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
};
