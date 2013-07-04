module Store
{
    root Invoice
    {
        int year;
        string number;
        date? paid;
        specification notPaid 'i => i.paid == null';
        index (number, year) where notPaid;
    }
}