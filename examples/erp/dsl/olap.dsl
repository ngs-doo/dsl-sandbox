module ERP
{
    snowflake OrderView from Order
    {
        created;
        delivery;
        customer.name;
        customer.ssn;
        totalCost;
    }

    olap cube OrderStats from OrderView
    {
        dimension name;
        dimension created;

        count created totalCreated;
        count delivery totalDelivered;
        avg totalCost averageCost;
    }    
}
