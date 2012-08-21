<?php

namespace ServiceExample\OrdersSvc;

require_once ('/library/IProcessOrders/iCustomerOrders.php');

use IProcessOrders\iCustomerOrders;
use DataModelsRepoSql08\CustomerOrderRepo;
use IDataModelsRepo\ICustomerOrderRepo;

/*
 * Todo: need to wire up real dependency injection.
 */
class CustomerOrders implements iCustomerOrders {
	
	/*
	 * @return ServiceExample\IDataModelsRepo\ICustomerOrderRepo
	 */
	public $orderRepo;
	
	/*
	 * @return String
	 */
	public $config;
	
	function __construct($orderRepo) {
		//$this->config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV);
		//this is where your dependency injection should pick up which repo class to use. 
		//I'm just using a quick if statement to simulate a dependency injection framework for my tests.
		//if a repo was passed in, use it, if now new up one.  
		//in this test case the convention is, tests will pass in a repo the real app wont.
		if($orderRepo == null){
			$connStr = $this->config->connStr;
			$this->orderRepo = new CustomerOrderRepo($connStr);
		} else {
			$this->orderRepo = $orderRepo;
		}
	}
	
	/* (non-PHPdoc)
	 * @see \ServiceExample\IProcessOrders\iCustomerOrders::GetOrderByOrderId()
	 */
	public function GetOrderByOrderId($orderId) {
		 $data = $this->orderRepo->GetOrderById($orderId);
		 $result = json_encode($data);
		 //we may want to put some logging here or other concerns that are application specific.
		 return $result;
      }

	/* (non-PHPdoc)
	 * @see \ServiceExample\IProcessOrders\iCustomerOrders::GetOrdersByDateRange()
	 */public function GetOrdersByDateRange($startDate, $endDate, $customerId) {
		// TODO Auto-generated method stub
		}

	/* (non-PHPdoc)
	 * @see \ServiceExample\IProcessOrders\iCustomerOrders::GetCustomerIdByName()
	 */public function GetCustomerIdByName($customerName) {
		// TODO Auto-generated method stub
		}

}

?>