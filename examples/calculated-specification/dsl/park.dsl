module Park
{
    root Vehicle
    {
        string model;
        int year;
        Engine *engine;

        specification isMuscleCar 'it => it.engine.power > 250 && it.year < 1980';

        // property calculated from specification
        calculated muscleCar from isMuscleCar;

        // calculated directly from expression
        calculated oldtimer from 'it => it.year < 1950';
    }

    entity Engine (serialNumber)
    {
        string serialNumber;
        int power;
    }

    snowflake CarList from Vehicle
    {
        model;
        year;
        engine.power;

        // reference calculated properties in snowflake
        muscleCar;
        oldtimer;
    }
}
