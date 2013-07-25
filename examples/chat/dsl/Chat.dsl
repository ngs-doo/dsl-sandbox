module Chat
{
    root User
    {
        string name;
    }

    root Message
    {
        timestamp created;
        string content;
        User *from;
        User? *to;
    }

    snowflake MessageView Message
    {
        created;
        content;
        from.ID fromID;
        from.name fromName;
    }
}
