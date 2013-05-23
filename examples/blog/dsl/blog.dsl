module Blog
{
    root Post {
        string title;
        string content;
        date createdAt;
        bool isVisible;
        Comment[] comments;
        Security.User *user;
    }

    entity Comment {
        string content;
        Security.User *user;
    }
}
