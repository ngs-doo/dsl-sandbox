module Store
{
    root Product
    {
        string name { unique; }
        money price;

        index (price);

        specification findByPriceRange 'it => it.price>min && it.price<max'
        {
            money min;
            money max;
        }
    }
}