<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $table = 'news_has_categories';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('news_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('news_id');
            $table->foreign('news_id')->references('id')->on('news')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->primary(['category_id', 'news_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
