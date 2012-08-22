using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using DataModels;
using IDataModelsRepo;

namespace DataModelsRepoSql08
{
    public class CustomerOrderRepo: ICustomerOrderRepo
    {
        public string ConnStr { get; set; }

        public CustomerOrderRepo(string connStr)
        {
            ConnStr = connStr;
        }
        public CustomerOrder GetOrderById(int id)
        {
            throw new NotImplementedException();
        }
    }
}
