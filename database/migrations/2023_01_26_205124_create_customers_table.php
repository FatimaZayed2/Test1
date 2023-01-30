<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name',100)->unique();
            $table->string('first_name',100);
            $table->text('Last_name',100)->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->float('Salary', 8, 2)->nullable();
            $table->boolean('status');
            $table->foreignId('user_id')->constrained('users')->onDelete('Cascade');

			$table->softDeletes();
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
        Schema::dropIfExists('customers');
    }
};
