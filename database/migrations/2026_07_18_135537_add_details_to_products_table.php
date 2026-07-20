<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->string('motif')->nullable()->after('stock');

            $table->string('bahan')->nullable()->after('motif');

            $table->string('ukuran')->nullable()->after('bahan');

            $table->text('short_description')->nullable()->after('description');

            $table->longText('long_description')->nullable()->after('short_description');

        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn([
                'motif',
                'bahan',
                'ukuran',
                'short_description',
                'long_description',
            ]);

        });
    }
};