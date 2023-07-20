<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();     // The timestamps method creates created_at and updated_at TIMESTAMP equivalent columns with an optional precision (total digits):
            $table->timestamp('deleted_at', $precision = 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     * Bisa dianggap menghapus TABEL yg sudah dibuat sebelumnya (ROLL BACK) -> cli : php artisan migrate:rollback
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
