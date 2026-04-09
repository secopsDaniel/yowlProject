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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('links')->unique()->index();
            $table->string('titre')->unique()->index();
            $table->string('description');
            $table->string('photo_video');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('login')->unique()->index();
            $table->string('email')->unique()->index();
            $table->longText('password');
            $table->string('gender');
            $table->string('role');
            $table->date('birthday');
            $table->timestamps();
        });
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->longText('contenu');
            $table->foreignId('user_id') ->constrained(table: 'users');
            $table->foreignId('comParent_id')->constrained(table: 'commentaires');
            $table->foreignId('id_post')->constrained(table: 'posts');
            $table->integer('likes');
            $table->integer('waring');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title') ->unique();

        });

         Schema::create('post_Categ', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained(table: 'posts');
            $table->foreignId('categ_id')->constrained(table: 'categories');

        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('commentaires');
        Schema::dropIfExists('categories');   
        Schema::dropIfExists('post_Categ');    
        Schema::dropIfExists('sessions');
    }
};
