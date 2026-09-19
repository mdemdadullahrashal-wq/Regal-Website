<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name_bn');
            $table->string('name_en');
            $table->string('tagline_bn')->nullable();
            $table->string('tagline_en')->nullable();
            $table->text('summary_bn')->nullable();
            $table->text('summary_en')->nullable();
            $table->json('features_bn')->nullable();
            $table->json('features_en')->nullable();
            $table->json('pricing_bn')->nullable();
            $table->json('pricing_en')->nullable();
            $table->json('faq_bn')->nullable();
            $table->json('faq_en')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('register_url')->nullable();
            $table->string('login_url')->nullable();
            $table->boolean('is_saas')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
