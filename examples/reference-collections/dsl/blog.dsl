module Blog
{
    root Post
    {
        string title;
        string content;
        
        Set<string> tags;           // strings set, distinct values
        List<timestamp> modifiedOn; // Timestamp object list
        Array<string> keywords;

        Comment[]? comments;     // entity collection, can be null
        Category[]? *categories; // root collection, can be null
        List<Link?> links;       // ? allows null values in collection
    }

    root Category
    {
        string title;
    }

    entity Comment
    {
        string email;
        string content;
    }

    value Link
    {
        string url;
        timestamp lastUpdated;
    }
}
