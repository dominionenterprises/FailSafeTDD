using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.ServiceModel.Web;
using System.Text;
using DataModels;
using DataModelsRepoSql08;
using IDataModelsRepo;
using IProcessOrders;

namespace OrderSvcExample
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the class name "Service1" in code, svc and config file together.
    // NOTE: In order to launch WCF Test Client for testing this service, please select Service1.svc or Service1.svc.cs at the Solution Explorer and start debugging.
    public class CustomerOrders : IProcessCustomerOrders
    {

        public ICustomerOrderRepo OrderRepo { get; set; }


        public CustomerOrders(ICustomerOrderRepo repo)
        {
            OrderRepo = repo;
            if(OrderRepo == null)
            {
                var connStr = "";
                OrderRepo = new CustomerOrderRepo(connStr);
            }
        }

        public CustomerOrder GetOrderByOrderId(int id)
        {
            var result = OrderRepo.GetOrderById(id);
            return result;
        }

        public List<CustomerOrder> GetOrdersByDateRange(DateTime startDate, DateTime endDate, int customerId)
        {
            throw new NotImplementedException();
        }

        public int GetCustomerIdByName(string customerName)
        {
            throw new NotImplementedException();
        }
    }
}
