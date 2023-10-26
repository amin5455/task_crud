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
        Schema::create('import_csv', function (Blueprint $table) {
            $table->id();
            $table->longText('Handle')->nullable();
            $table->text('Title')->nullable();
            $table->text('Body (HTML)')->nullable();
            $table->text('Vendor')->nullable();
            $table->text('Product Category')->nullable();
            $table->text('Type')->nullable();
            $table->text('Tags')->nullable();
            $table->text('Published')->nullable();
            $table->text('Option1 Name')->nullable();
            $table->text('Option1 Value')->nullable();
            $table->text('Option2 Name')->nullable();
            $table->text('Option2 Value')->nullable();
            $table->text('Option3 Name')->nullable();
            $table->text('Option3 Value')->nullable();
            $table->text('Variant SKU')->nullable();
            $table->text('Variant Inventory Tracker')->nullable();
            $table->text('Image Src')->nullable();
            $table->text('Image Position')->nullable();
            $table->text('Image Alt Text')->nullable();
            $table->text('Gift Card')->nullable();
            $table->text('SEO Title')->nullable();
            $table->text('Variant Image')->nullable();
            $table->text('Variant Weight Unit')->nullable();
            $table->longText('Compare At Price')->nullable();
            $table->text('Status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_csvs');
    }
};
