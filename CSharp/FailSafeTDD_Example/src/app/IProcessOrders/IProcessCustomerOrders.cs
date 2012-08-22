using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using DataModels;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.ServiceModel.Web;
using System.Text;

namespace IProcessOrders
{
    public interface IProcessCustomerOrders
    {
        [OperationContract]
        CustomerOrder GetOrderByOrderId(int id);

        [OperationContract]
        List<CustomerOrder> GetOrdersByDateRange(DateTime startDate, DateTime endDate, int customerId);

        [OperationContract]
        int GetCustomerIdByName(string customerName);
    }
}
