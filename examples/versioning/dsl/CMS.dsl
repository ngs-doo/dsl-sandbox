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
}