<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MoviesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('movie_id');
            $table->foreign('movie_id')
                ->references('id')->on('movies')->cascadeOnDelete();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')->cascadeOnDelete();
            $table->dateTime('rented_at')->nullable(false);
        });

        Schema::table('movie_user', function (Blueprint $table) {
            if (!$this->existsIndex($table->getTable(), 'movie_user_movie_id_index')) {
                $table->index('movie_id');
            }
            if (!$this->existsIndex($table->getTable(), 'movie_user_user_id_index')) {
                $table->index('user_id');
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
        Schema::table('movie_user', function (Blueprint $table) {
            if ($this->existsIndex($table->getTable(), 'movie_user_movie_id_index')) {
                $table->dropIndex('movie_user_movie_id_index');
            }
            if ($this->existsIndex($table->getTable(), 'movie_user_user_id_index')) {
                $table->dropIndex('movie_user_user_id_index');
            }
        });
        Schema::table('movie_user', function (Blueprint $table) {
            Schema::dropIfExists('movie_user');
        });
    }


    protected function existsIndex(string $tableName, string $index) : bool
    {
        return array_key_exists(
            strtolower($index),
            \Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($tableName)
        );
    }
}
