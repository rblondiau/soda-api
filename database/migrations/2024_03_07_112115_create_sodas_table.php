<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Table for softdrinks
        Schema::create('sodas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->unsignedBigInteger('brand_id');
            $table->boolean('carbonated')->default(true);
            $table->boolean('caffeinated')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sodas');
    }
};


// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateSodasTable extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         // Table for Soft Drinks
//         Schema::create('sodas', function (Blueprint $table) {
//             $table->id();
//             $table->string('name');
//             $table->unsignedBigInteger('brand_id');
//             $table->boolean('carbonated')->default(true);
//             $table->boolean('caffeinated')->default(false);
//             $table->timestamps();

//             // Foreign key relationship with Brands table
//             $table->foreign('brand_id')->references('id')->on('brands');
//         });

//         // Table for Brands
//         Schema::create('brands', function (Blueprint $table) {
//             $table->id();
//             $table->string('name');
//             $table->unsignedSmallInteger('founded_year')->nullable();
//             $table->string('country')->nullable();
//             $table->timestamps();
//         });

//         // Table for Flavors
//         Schema::create('flavors', function (Blueprint $table) {
//             $table->id();
//             $table->string('name');
//             $table->timestamps();
//         });

//         // Many-to-Many relationship table for Soft Drinks and Flavors
//         Schema::create('soda_flavor', function (Blueprint $table) {
//             $table->id();
//             $table->unsignedBigInteger('soda_id');
//             $table->unsignedBigInteger('flavor_id');
//             $table->timestamps();

//             // Foreign key relationships
//             $table->foreign('soda_id')->references('id')->on('sodas')->onDelete('cascade');
//             $table->foreign('flavor_id')->references('id')->on('flavors')->onDelete('cascade');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('soda_flavor');
//         Schema::dropIfExists('sodas');
//         Schema::dropIfExists('brands');
//         Schema::dropIfExists('flavors');
//     }
// }
