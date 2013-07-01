module Park
{
    root Vehicle
    {
        string model;
        int year;
        Engine *engine;
        CurrentState? state;
        Company? *company;

        // concatenate strings into single property
        calculated string description from 
            'it => it.model + ", " + it.year + "; " + it.engine.power';

        // simple math calculation
        calculated int enginePowerInWatts from 'it => it.engine.power * 746';
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
