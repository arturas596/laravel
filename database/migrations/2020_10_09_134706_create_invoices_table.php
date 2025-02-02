<?php
// create_invoices_table
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateInvoicesTable extends Migration
{
 /**
 * Run the migrations.
 *
 * @return void
 */
 public function up()
 {
 Schema::create('invoices', function (Blueprint $table) {
 $table->increments('id');
 $table->integer('user_id');
 $table->integer('order_id');
 $table->integer('paid_amount');
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
 Schema::dropIfExists('invoices');
 }
}
