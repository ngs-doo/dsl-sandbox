module Park
{
    root Vehicle
    {
        string model;
        int year;
        Engine *engine;
        CurrentState? state;
        Company? *company;
    }

    root Company
    {
        string name;
    }

    entity Engine (serialNumber)
    {
        string serialNumber;
        int power;
    }

    value CurrentState
    {
        float litersInTank;
        int mileage;
        int oilChangeIn;
    }
}
