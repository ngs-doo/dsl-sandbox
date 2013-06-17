module Cinema
{
    root Movie
    {
        // string type maps to native string in PHP
        string title;
        // string with length has added in check for string value
        string(10) shortTitle;
        
        // both int and long types map to PHP integer
        int year;
        long durationSeconds;
        
        // both float and double types map to PHP float
        float violenceFactor;
        double loudnessIndex;

        // boolean type maps to PHP boolean
        bool under18;
        
        // map is a key-value type, represented as a PHP native array
        map awards;
}
