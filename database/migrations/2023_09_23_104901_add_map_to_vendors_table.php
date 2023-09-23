<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMapToVendorsTable extends Migration
{
    public function up()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->text('map')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('vendors', function (Blueprint $table) {
            //
        });
    }
}
