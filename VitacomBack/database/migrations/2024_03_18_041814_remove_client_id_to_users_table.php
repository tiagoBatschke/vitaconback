<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveClientIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('users', 'client_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('client_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasColumn('users', 'client_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->foreignId('client_id')->nullable()->constrained('clients');
            });
        }
    }
}
