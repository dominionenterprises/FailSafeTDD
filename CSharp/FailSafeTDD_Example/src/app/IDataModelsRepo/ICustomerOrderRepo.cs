using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using DataModels;

namespace IDataModelsRepo
{
    public interface ICustomerOrderRepo
    {
       CustomerOrder GetOrderById(int id);
    }
}
