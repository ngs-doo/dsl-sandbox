module Store
{
    root Invoice
    {
        int year;
        string number;
        date? paid;

        string code { versioning  'it => it.number + "-" + DateTime.Today.Year '; }
    }
}