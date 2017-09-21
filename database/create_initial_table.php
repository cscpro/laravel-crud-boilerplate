<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

		// Add column on existing table
		Schema::table( 'users', function( Blueprint $table ) {
			$table->string( 'nip' )->after( 'name' )->nullable();
		} );

		// Create new table
		Schema::create( 'seasons', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'year' );
			$table->boolean( 'is_current' )->default( false );
			$table->timestamps();
			$table->softDeletes();
		} );

		// Create table that has foreign key
		Schema::create( 'periods', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'season_id' )->unsigned();
			$table->integer( 'role' );
			$table->string( 'date_from' );
			$table->string( 'date_to' );
			$table->timestamps();
			$table->softDeletes();

			$table->unique( ['season_id', 'role'] );
			$table->foreign( 'season_id' )
				->references( 'id' )
				->on( 'seasons' )
				->onDelete( 'cascade' )
			;
		} );

	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists( 'periods' );
		Schema::dropIfExists( 'seasons' );
		Schema::table( 'users', function( Blueprint $table ) {
			$table->dropColumn( 'nip' );
		} );
    }

}
