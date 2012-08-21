<?php

namespace IProcessOrders;

interface iCustomerOrders {
	public function GetOrderByOrderId($orderId);
	public function GetOrdersByDateRange($startDate,$endDate,$customerId);
	public function GetCustomerIdByName($customerName);
}

?>