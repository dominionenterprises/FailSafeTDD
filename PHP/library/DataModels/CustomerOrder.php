<?php

namespace DataModels;

class CustomerOrder {
	/*
	 * @return int
	 */
	public $orderId;
	
	/*
	 *@return DateTime 
	 */
	public $orderDate;
	
	/*
	 * @return CustomerInfo
	 */
	//public $customer;
	
	/*
	 * @return array[];
	 */
	//public $items;
	
}

class ItemDetails{
	/*
	 * @return int
	 */
	public $quantity;
	
	/*
	 * @return float
	 */
	public $price;
	
	/*
	 * @return string
	 */
	public $name;
	
	/*
	 * @return string
	 */
	public $description;
	
}

class CustomerInfo{
	/*
	 * @return int
	 */
	public $customerId;
	
	/*
	 * @retun string
	 */
	public $name;
	
	/*
	 * @return string
	 */
	public $address;
	
	/*
	 * @return string
	 */
	public $zip;
}
?>