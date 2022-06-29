<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('auth_type');
            $table->string('google_id')->nullable();
            $table->string('avatar')->nullable();

            if (app()->environment('testing')) {
                $table->string('auth_type')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(
                [
                    'auth_type',
                    'google_id',
                    'avatar',
                ]
            );
        });
    }
};
