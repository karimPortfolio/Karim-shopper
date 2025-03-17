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
        Schema::table('orders', function (Blueprint $table) {
            $table->string("city")->after("address");
            $table->string("country")->after("city");
            // rename column pincode to postcode
            $table->renameColumn("pincode", "postcode");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn("city");
            $table->dropColumn("country");
            // rename column postcode to pincode
            $table->renameColumn("postcode", "pincode");
        });
    }
};
