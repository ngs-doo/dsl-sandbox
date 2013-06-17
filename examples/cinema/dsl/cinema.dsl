module Cinema
{
    root Movie
    {
        // string maps to PHP string
        string title;
        // string with length has added in check for string value
        string(10) shortTitle;
        
        // int and long map to PHP integer
        int year;
        long durationSeconds;
        
        // float and double map to PHP float
        float violenceFactor;
        double loudnessIndex;

        // maps to PHP boolean
        bool under18;
        
        // map is a key-value type, represented as a PHP native array
        map awards;

        binary poster;
        
        date released;
        timestamp premiered;
        
        decimal criticsRating;
        decimal(4) publicRating;
        
        guid catalogId;

        money budget;

        xml captions;
    }
}
