module ERP
{
    aggregate Product {
        string name;
        string description;
        money price;
    }

    root ConversionRate
    {
        string from;
        string to;
        float rate;

        persistence { readonly; }
    }
}
