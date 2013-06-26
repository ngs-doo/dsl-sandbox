module Park
{
    root Vehicle
    {
        string model;
        int year;
        Engine *engine;

        specification isMuscleCar 'it => it.engine.power > 250 && it.year < 1970';
        calculated muscleCar from isMuscleCar;
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
