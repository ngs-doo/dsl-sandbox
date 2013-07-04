module Blog
{
    root Post
    {
        string title;
        Comment[] *comments;
    }

    root User
    {
        string email;
        Comment[] *comments;
    }

    entity Comment(ID)
    {
        guid ID;
        string email;
        string content;
    }
}
