module Cinema
{
    root Movie
    {
        // NGS\ByteStream
        binary poster;
        
        // NGS\LocalDate
        date released;
        // NGS\TimeStamp
        timestamp premiered;
        
        // NGS\BigDecimal
        decimal criticsRating;
        decimal(4) publicRating;
        
        // NGS\Money is a decimal value with scale 2 that is rounded up
        money budget;

        // NGS\UUID
        guid catalogId;

        // SimpleXMLElement
        xml captions;

        // structure holding two double properties: x and y
        location filmingLocation;

        // structure holding two integer properties: x and y
        point turningPoint;

        string title;
        string(10) shortTitle;
        int year;
        long durationSeconds;
        float violenceFactor;
        double loudnessIndex;
        bool under18;
        map awards;
    }
}
