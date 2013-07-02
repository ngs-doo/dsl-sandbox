module ERP
{
    aggregate Product {
        string name;
        string description;
        money price;
    }
    
    aggregate Customer {
        string name;
        string ssn;
        string address;
    }
    
    aggregate Order {
        date created;
        date? delivery;
        Customer *customer { snapshot; }
        List<LineItem> items;
        calculated money totalCost from
             'o => o.items.Sum(i => i.quantity * i.product.price)';
    }
    
    entity LineItem {
        Product *product { snapshot; }
        decimal quantity;
    }
    
    report CustomerOrders {
        string ssn;
        int totalOrder;
        Customer customer 'it => it.ssn == ssn';
        Order[] orders 'it => it.customer.ssn == ssn'
            order by created desc limit totalOrder;
        
        templater buildReportsTxt 'report.txt';

        templater buildReports 'Orders.docx';
        // templater in pdf format
        templater buildReportsPdf 'Orders.docx' pdf;
    }
}
