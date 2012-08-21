<?php
/*
 * In TDD classes with high test friction are bad
 * This class is hard to test becasue we have to have
 * 1. a database
 * 2. with a table called order_items
 * 3. with more than one record with an orderId of 1234.
 * 4. set tax rate relies on a service we call using curl, that must exist before we can test
 */
class HighTestFrictionClass{
	public $orderId =0;
	public $customerId = 0;
	public $TaxRate = 0;
	public $orderTotal = 0;
	function __construct(){
		
	}
	
	/**
	 * We have a static method that is new'ing up itself, probably not a good thing.
	 * @param unknown_type $orderId
	 * @return number
	 */
	public static function calculateTax($orderId){
		$foo = new HighTestFrictionClass();
		$foo->orderId = $orderId;
		$foo->setOrderTotal();
		$foo->setTaxRate();
		$foo->orderTotal = $foo->orderTotal * $foo->TaxRate;
		return $foo->orderTotal;
	}
	
	public function setOrderTotal(){
		//....
		$this->orderTotal = mysql_query('select SUM(price * quantity) from order_items where orderId ='.$this->orderId);
		
	}
		
	public function setTaxRate(){
		//....
		$ch = "";
		$this->TaxRate = curl_exec($ch);
	}	
}

class CalculateTaxTest extends PHPUnit_Framework_TestCase{
	/*
	 * If this were not a common business scenario, with an obvious price, this might be more difficult to understand
	 */
	public function testSunnyDay_HardToRead(){	
		$this->assertEquals(19.95, HighTestFrictionClass::calculateTax(1234));
	}
	
	public function testSunnyDay_EasierToRead(){
		$orderId = 1234;
		$expected = 19.95;
		$actual = HighTestFrictionClass::calculateTax($orderId);
		$this->assertEquals($expected, $actual);
	}
	
}