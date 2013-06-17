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
        
        // NGS\UUID
        guid catalogId;

        // NGS\Money
        money budget;

        // SimpleXMLElement
        xml captions;

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
