<?php

namespace DataModelsRepoSql08;

require_once ('library/IDataModelsRepo/ICustomerOrderRepo.php');

use IDataModelsRepo\ICustomerOrderRepo;
use DataModels\ItemDetails;
use DataModels\CustomerInfo;
use DataModels\CustomerOrder;

class CustomerOrderRepo implements ICustomerOrderRepo {
	public $connStr;
	
	function __construct($connString) {
		$connStr = $connString;
	}
	public function GetOrderById($id) {
	    $c = new CustomerOrder();
		$c->orderId = 1;
		$c->orderDate = "2012-07-08";
		return $c;
	}
	
	
	function __destruct() {
	}
}

?>