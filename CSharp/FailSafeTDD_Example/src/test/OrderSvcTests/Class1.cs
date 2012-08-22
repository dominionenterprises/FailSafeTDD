using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using DataModels;
using IDataModelsRepo;
using IProcessOrders;
using NUnit.Framework;
using Moq;
using OrderSvcExample;

namespace OrderSvcTests
{
    public class CustomerOrdersTests
    {

        [Test]
        public void Interface_ICustomerOrder_GetOrderByOrderId_SunnyDate()
        {
            var id = 12345;
            var mock = new Mock<IProcessCustomerOrders>();
            mock.Setup(x => x.GetOrderByOrderId(It.IsAny<int>())).Returns(GetFakeGoodCustomerOrder);
            var expected = GetFakeGoodCustomerOrder();
            var actual = mock.Object.GetOrderByOrderId(id);
            Assert.AreEqual(expected.OrderId,actual.OrderId);
            mock.Verify(x=>x.GetOrderByOrderId(id),Times.Once(),"The mock was called more than one time.");
        }


        [Test]
        public void OrderSvc_CustomerOrder_GetByOrderId_SunnyDay()
        {
            var id = 12345;
            var mockRepo = new Mock<ICustomerOrderRepo>();
            mockRepo.Setup(x => x.GetOrderById(It.IsAny<int>())).Returns(GetFakeGoodCustomerOrder);
            var svc = new CustomerOrders(mockRepo.Object);
            var actual = svc.GetOrderByOrderId(id);
            var expected = GetFakeGoodCustomerOrder();
            Assert.AreEqual(actual.OrderId,expected.OrderId);
            mockRepo.Verify(x=>x.GetOrderById(It.IsAny<int>()),Times.Once(),"the repo was called more than once.");
        }

        public CustomerOrder GetFakeGoodCustomerOrder()
        {
            var result = new CustomerOrder
                {
                    OrderId = 12345,
                    OrderDate = new DateTime(2012, 7, 12),
                    Customer = new CustomerInfo
                        {
                            Name = "John Doe",
                            Address = "150 Granby",
                            Zip = 23510
                        }
                };
            return result;
        }
    }
}
