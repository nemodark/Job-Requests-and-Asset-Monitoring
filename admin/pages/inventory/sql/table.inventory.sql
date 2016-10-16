-- 
-- Editor SQL for DB table inventory
-- Created by http://editor.datatables.net/generator
-- 

CREATE TABLE `inventory` (
	`id` int(10) NOT NULL auto_increment,
	`assetloc` varchar(255),
	`assetcat` varchar(255),
	`assetname` varchar(255),
	`assettype` varchar(255),
	`assetdesc` varchar(255),
	`assetmodel` varchar(255),
	`serialno` varchar(255),
	`datepurchase` varchar(255),
	`supplier` varchar(255),
	`purchaseprice` varchar(255),
	`assetqty` varchar(255),
	`assettotal` varchar(255),
	`remarks` varchar(255),
	`formno` varchar(255),
	PRIMARY KEY( `id` )
);