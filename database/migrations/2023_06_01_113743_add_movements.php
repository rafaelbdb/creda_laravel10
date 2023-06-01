<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('movements', function (Blueprint $table) {
            $table->date('date')->after('amount');
            $table->string('description')->nullable()->after('date');
            $table->unsignedBigInteger('user_id')->after('id');
            $table->unsignedBigInteger('category_id')->after('user_id');
            $table->integer('amount')->after('category_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('movements')->truncate();
    }
};
