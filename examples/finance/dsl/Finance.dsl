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

    root Invoice
    {
        int year;
        string number;
        date? paid;
        specification notPaid 'i => i.paid == null';
        index (number, year) where notPaid;
    }
}