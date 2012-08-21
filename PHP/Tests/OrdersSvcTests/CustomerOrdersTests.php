<?php
namespace ServiceExample\Tests\OrdersSvcTests;

use ServiceExample\OrdersSvc\CustomerOrders;

require_once '../../library/DataModels/CustomerOrder.php';
require_once '../../library/IProcessOrders/iCustomerOrders.php';
require_once '../../library/IDataModelsRepo/ICustomerOrderRepo.php';
require_once '../../OrderSvcExample/CustomerOrders.php';

use DataModels\ItemDetails;
use DataModels\CustomerInfo;
use DataModels\CustomerOrder;
use IProcessOrders\iCustomerOrders;
use IDataModelsRepo\ICustomerOrderRepo;
use ServiceExample\OrdersSvc as svcNS;

class CustomerOrdersTests extends \PHPUnit_Framework_TestCase {

	public function testInterfacet_ICustomerOrder_GetOrderByOrderId_SunnyDay(){
		$id = 12345;
		$mock = $this->getMock('IProcessOrders\iCustomerOrders');
		$mock->expects($this->once())->method('GetOrderByOrderId')->with($id)->will($this->returnValue($this->getFakeGoodCustomerOrder()));
		$expected= $this->getFakeGoodCustomerOrder();
		$actual = $mock->GetOrderByOrderId($id);
		$this->assertEquals($expected, $actual);
	}
	
	public function testOrdersSvc_CustomerOrder_GetByOrderId_SunnyDay(){
		$id = 12345;
		$mockRepo = $this->getMock('IDataModelsRepo\iCustomerOrderRepo');
		$mockRepo->expects($this->once())->method('GetOrderById')->with($id)->will($this->returnValue($this->getFakeGoodCustomerOrder()));
		
		//$mock = $this->getMockBuilder('ServiceExample\OrdersSvc\CustomerOrders')->disableOriginalConstructor()->getMock();
		$svc = new svcNS\CustomerOrders($mockRepo);
		$actual = $svc->GetOrderByOrderId($id);
		
		//uncomment to show a failing test.
		//$expected= $this->getFakeGoodCustomerOrder();
		$expected= json_encode($this->getFakeGoodCustomerOrder());
		$msg = "The service did not return the expected result.";
		$msg .= $expected;
		$this->assertEquals($expected, $actual,$msg);
	}
	
	public function getFakeGoodCustomerOrder(){
		$c = new CustomerOrder();
		$c->orderId = 1;
		$c->orderDate = "2012-07-08";
		$c->customer = $this->getFakeGoodCustomerInfo ();
		$c->items = $this->getFakeGoodItems();
		
	}
	
	public function getFakeGoodItems(){
		$first = new ItemDetails();
		$first->name = "Test Item 1";
		$first->price = 19.95;
		$first->quantity= 2;
		
		$second = new ItemDetails();
		$second->name = "Test Item 2";
		$second->price = "5.55";
		$second->quantity = 3;
		
		$result = array($first,$second);
		return $result;
		
	}
	
	 public function getFakeGoodCustomerInfo() {
		$cust = new CustomerInfo();
		$cust->customerId = 1;
		$cust->name = "John Doe";
		$cust->zip = 23510;
		$cust->address = "150 Granby Street";
		return $cust;
	}

}

?>