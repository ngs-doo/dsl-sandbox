module CMS
{
    root Post
    {
        string title;
        string content;
        timestamp? publishedOn;
        timestamp createdAt;
        timestamp modifiedAt { versioning; }
    }

    root Comment
    {
        string content;
        timestamp createdAt;
        timestamp modifiedAt { versioning; }
    }

    root Page
    {
        string title;
        string content;
        timestamp createdAt;
        timestamp modifiedAt { versioning; }
    }
}