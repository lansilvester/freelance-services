<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveKategoriIdFromVendors extends Migration
{
    public function up()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropForeign('vendors_kategori_id_foreign'); // Nama foreign key constraint
            $table->dropColumn('kategori_id');
        });
    }

    public function down()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
    
}
