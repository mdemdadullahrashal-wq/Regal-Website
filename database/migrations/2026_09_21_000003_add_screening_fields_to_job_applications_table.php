<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->string('address')->nullable()->after('photo');
            $table->string('has_sales_experience')->nullable()->after('address');
            $table->string('years_experience')->nullable()->after('has_sales_experience');
            $table->string('software_experience')->nullable()->after('years_experience');
            $table->string('work_type')->nullable()->after('software_experience');
            $table->string('work_from_home')->nullable()->after('work_type');
            $table->string('home_address')->nullable()->after('work_from_home');
            $table->string('commission_based')->nullable()->after('home_address');
            $table->string('expected_salary')->nullable()->after('commission_based');

            // cover_letter is no longer collected by the screening form.
            $table->text('cover_letter')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropColumn([
                'address',
                'has_sales_experience',
                'years_experience',
                'software_experience',
                'work_type',
                'work_from_home',
                'home_address',
                'commission_based',
                'expected_salary',
            ]);

            $table->text('cover_letter')->change();
        });
    }
};
