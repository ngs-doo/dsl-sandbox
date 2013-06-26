module Park
{
    root Vehicle
    {
        string model;
        int year;
        Engine *engine;

        specification isMuscleCar 'it => it.engine.power > 250 && it.year < 1980';
        calculated muscleCar from isMuscleCar;
    }

    entity Engine (serialNumber)
    {
        string serialNumber;
        int power;
    }
}
