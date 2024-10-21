<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTahunTerbitFromBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('tahun_terbit');
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->integer('tahun_terbit'); // or any default value or settings you had
        });
    }
}

