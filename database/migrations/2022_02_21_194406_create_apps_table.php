<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('text');
            $table->binary('img_before');
            $table->binary('img_after')->nullable();
            $table->boolean('solved')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        DB::statement("ALTER TABLE apps MODIFY COLUMN img_before LONGBLOB");
        DB::statement("ALTER TABLE apps MODIFY COLUMN img_after LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apps');
    }
}
