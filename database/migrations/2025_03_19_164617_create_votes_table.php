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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            //We may use the polymorphic relationship allows flexibility if you want to extend voting to other entities in the future (e.g., Post, Comment, or another model).
            //but Slightly more complex to set up and query due to the type columns, (((especially if you’re only dealing with User for now))),
            //and polymorphic relationships require resolving the type column, which can be marginally slower than direct foreign keys.
            $table->foreignId('voter_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('candidate_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['voter_id', 'candidate_id']);  //Users can only vote once per user.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
