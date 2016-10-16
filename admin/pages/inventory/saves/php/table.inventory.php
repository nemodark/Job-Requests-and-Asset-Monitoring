<?php

/*
 * Editor server script for DB table inventory
 * Created by http://editor.datatables.net/generator
 */

// DataTables PHP library and database connection
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;


// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'inventory', 'assetid' )
	->fields(
		Field::inst( 'userid' )
			->validator( 'Validate::numeric' ),
		Field::inst( 'invsyid' )
			->validator( 'Validate::numeric' ),
		Field::inst( 'assetloc' ),
		Field::inst( 'assetcat' ),
		Field::inst( 'assetname' ),
		Field::inst( 'assettype' ),
		Field::inst( 'assetdesc' ),
		Field::inst( 'assetmodel' ),
		Field::inst( 'serialno' ),
		Field::inst( 'datepurchase' )
			->validator( 'Validate::dateFormat', array( 'format'=>'m/d/y' ) )
			->getFormatter( 'Format::date_sql_to_format', 'm/d/y' )
			->setFormatter( 'Format::date_format_to_sql', 'm/d/y' ),
		Field::inst( 'supplier' ),
		Field::inst( 'purchaseprice' )
			->validator( 'Validate::numeric' ),
		Field::inst( 'assetqty' )
			->validator( 'Validate::numeric' ),
		Field::inst( 'assettotal' )
			->validator( 'Validate::numeric' ),
		Field::inst( 'remarks' ),
		Field::inst( 'formno' )
	)
	->process( $_POST )
	->json();
