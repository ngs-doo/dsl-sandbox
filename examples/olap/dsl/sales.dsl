module travel
{
    root City {
        string title;
    }

    root Trip {
        City *start;
        City *end;
        int distance;
        int duration;
    }

    
}
