using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace DataModels
{
    public class CustomerOrder
    {
        public int OrderId { get; set; }
        public DateTime OrderDate { get; set; }
        public CustomerInfo Customer { get; set; }
        public List<ItemDetails> Items { get; set; }

    }

    public class ItemDetails
    {
        public int Quantity { get; set; }
        public Decimal Price { get; set; }
        public string Name { get; set; }
        public string Description { get; set; }
    }

    public class CustomerInfo
    {
        public int CustomerId { get; set; }
        public string Name { get; set; }
        public string Address { get; set; }
        public int Zip { get; set; }

    }
}
