module Blog
{
    root Post
    {
        string title;
        string content;
        
        Category[]? *categories;
        Comment[]? comments;
        Tag[] *tags;
        Link?[]? links;
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

    root Tag(code)
    {
        string code;
    }
    
    value Link
    {
        string url;
        timestamp lastUpdated;
    }
}
