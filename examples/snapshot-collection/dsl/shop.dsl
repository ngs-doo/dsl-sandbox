module Shop
{
    root Product
    {
        string name;
        money price;
    }

    root Customer
    {
    	string name;
    }

    root Order
    {
    	Customer *customer;
    	Product[] *products { snapshot; }
    }
}