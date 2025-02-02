<?php
// create_orders_table
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateOrdersTable extends Migration
{
 /**
 * Run the migrations.
 *
 * @return void
 */
 public function up()
 {
 Schema::create('orders', function (Blueprint $table) {
 $table->increments('id');
 $table->integer('user_id');
 $table->integer('item_id');
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
 Schema::dropIfExists('orders');
 }
}