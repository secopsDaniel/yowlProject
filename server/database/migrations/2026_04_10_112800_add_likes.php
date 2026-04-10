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
         Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id') ->constrained(table: 'users');
            $table->foreignId('com_id')->constrained(table: 'commentaires');
            $table->timestamps();

        });

    Schema::table('commentaires', function (Blueprint $table) {
       $table->dropColumn('likes');
       $table->softDeletes();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
