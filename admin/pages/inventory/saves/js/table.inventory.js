
/*
 * Editor client script for DB table inventory
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.inventory.php',
		table: '#inventory',
		fields: [
			{
				"label": "a",
				"name": "userid",
				"def": "userid"
			},
			{
				"label": "a",
				"name": "invsyid"
			},
			{
				"label": " Room\/Location",
				"name": "assetloc"
			},
			{
				"label": "Asset Category",
				"name": "assetcat"
			},
			{
				"label": "Asset Name",
				"name": "assetname"
			},
			{
				"label": "Type",
				"name": "assettype"
			},
			{
				"label": "Description",
				"name": "assetdesc"
			},
			{
				"label": "Model",
				"name": "assetmodel"
			},
			{
				"label": "Serial No.",
				"name": "serialno"
			},
			{
				"label": "Date Purchase",
				"name": "datepurchase",
				"type": "datetime",
				"format": "MM\/DD\/YY"
			},
			{
				"label": "Supplier",
				"name": "supplier"
			},
			{
				"label": "Purchase Price",
				"name": "purchaseprice"
			},
			{
				"label": "Lot\/Qty",
				"name": "assetqty"
			},
			{
				"label": "Total",
				"name": "assettotal"
			},
			{
				"label": "Remarks",
				"name": "remarks"
			},
			{
				"label": "Form #",
				"name": "formno"
			}
		]
	} );

	var table = $('#inventory').DataTable( {
		dom: 'Bfrtip',
		ajax: 'php/table.inventory.php',
		columns: [
			{
				"data": "assetloc"
			},
			{
				"data": "assetcat"
			},
			{
				"data": "assetname"
			},
			{
				"data": "assettype"
			},
			{
				"data": "assetdesc"
			},
			{
				"data": "assetmodel"
			},
			{
				"data": "serialno"
			},
			{
				"data": "datepurchase"
			},
			{
				"data": "supplier"
			},
			{
				"data": "purchaseprice"
			},
			{
				"data": "assetqty"
			},
			{
				"data": "assettotal"
			},
			{
				"data": "remarks"
			},
			{
				"data": "formno"
			}
		],
		select: true,
		lengthChange: false,
		buttons: [
			{ extend: 'create', editor: editor },
			{ extend: 'edit',   editor: editor },
			{ extend: 'remove', editor: editor }
		]
	} );
} );

}(jQuery));

