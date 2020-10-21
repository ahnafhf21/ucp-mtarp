<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('accounts', function (Blueprint $table) {
        $table->string('name')->nullable();
        $table->string('reset_email')->nullable();
        $table->string('facebook')->nullable();
        $table->string('twitter')->nullable();
        $table->string('instagram')->nullable();
        $table->string('description')->nullable();
        $table->string('token')->nullable();
        $table->rememberToken();
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('accounts', function (Blueprint $table) {
          $table->dropColumn('name');
          $table->dropColumn('reset_email');
          $table->dropColumn('facebook');
          $table->dropColumn('instagram');
          $table->dropColumn('twitter');
          $table->dropColumn('description');
          $table->dropColumn('remember_token');
          $table->dropColumn('updated_at');
          $table->dropColumn('created_at');
          $table->dropColumn('token');
      });
    }
}
