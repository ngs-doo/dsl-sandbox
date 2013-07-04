module CMS
{
    root Post
    {
        string title;
        string content;
        timestamp? publishedOn;
        timestamp createdAt;
        timestamp modifiedAt;
    }

    root Comment
    {
        string content;
        timestamp createdAt;
        timestamp modifiedAt;
    }

    root Page
    {
        string title;
        string content;
        timestamp createdAt;
        timestamp modifiedAt;
    }
}