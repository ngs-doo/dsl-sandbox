module CMS
{
    mixin logging
    {
        timestamp createdAt;
        timestamp modifiedAt;
    }

    root Post
    {
        has mixin logging;
        string title;
        string content;
        timestamp? publishedOn;
    }

    root Comment
    {
        has mixin logging;
        string content;
    }

    root Page
    {
        has mixin logging;
        string title;
        string content;
    }
}