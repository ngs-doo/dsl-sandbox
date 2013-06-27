module Park
{
    root Vehicle
    {
        string model;
        int year;
        Engine *engine;

        specification hasValidModelLength
                'it => it.model.Length > 2';

        validation ValidVehicle
        {
            specification hasValidYear
                'it => it.year>1900 && it.year<2013'
                'it => "You must enter a valid year"';
            specification hasValidModelLength
                'it => "Model name too short"';
            check;
        }
    }

    entity Engine (serialNumber)
    {
        string serialNumber;
        int power;
    }
}
