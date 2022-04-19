<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWgGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wg_groups', function (Blueprint $table) {
            $table->id();
            $table->string('wg_name');

            $table->unsignedBigInteger('user_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('users');

/*            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');*/

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
        Schema::dropIfExists('wg_groups');
    }
}
