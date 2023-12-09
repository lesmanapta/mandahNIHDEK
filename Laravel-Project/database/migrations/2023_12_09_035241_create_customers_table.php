<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('username', 45);
            $table->string('password');
            $table->string('fullnameCustomer', 45);
            $table->mediumText('address')->nullable();
            $table->string('phonenumber', 20)->nullable()->default('0');
            $table->string('email', 128)->unique();
            $table->timestamps(); // created_at dan updated_at
            $table->timestamp('last_login')->nullable();
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
}
