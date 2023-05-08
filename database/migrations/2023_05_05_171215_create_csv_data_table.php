<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('csv_data', function (Blueprint $table) {
            $table->id();
            $table->string('cut');
            $table->char('color');
            $table->string('clarity');
            $table->float('carat_weight');
            $table->string('cut_quality');
            $table->string('lab');
            $table->string('symmetry');
            $table->string('polish');
            $table->string('eye_clean');
            $table->string('culet_size');
            $table->string('culet_condition');
            $table->float('depth_percent');
            $table->float('table_percent');
            $table->float('meas_length');
            $table->float('meas_width');
            $table->float('meas_depth');
            $table->string('girdle_min');
            $table->string('girdle_max');
            $table->string('fluor_color');
            $table->string('fluor_intensity');
            $table->string('fancy_color_dominant_color');
            $table->string('fancy_color_secondary_color');
            $table->string('fancy_color_overtone');
            $table->string('fancy_color_intensity');
            $table->double('total_sales_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csv_data');
    }
};
