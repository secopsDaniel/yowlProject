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
        Schema::table('commentaires', function (Blueprint $table) {
            $table->integer('like')->nullable()->after('waring');
            $table->dropForeign(['comParent_id']);
            $table->unsignedBigInteger('comParent_id')->nullable()->change();
            $table->foreign('comParent_id')->references('id')->on('commentaires');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->dropForeign(['comParent_id']);
            $table->dropColumn('like');
            $table->unsignedBigInteger('comParent_id')->nullable(false)->change();
            $table->foreign('comParent_id')->references('id')->on('commentaires');
        });
    }
};
