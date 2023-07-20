<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     * Bisa dianggap menghapus TABEL yg sudah dibuat sebelumnya (ROLL BACK) -> cli : php artisan migrate:rollback
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
