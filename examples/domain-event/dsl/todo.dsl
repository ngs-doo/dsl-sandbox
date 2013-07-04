module Todo
{
    root Task
    {
        string name;
        int priority;
        bool isDone;
        timestamp created;
        Group? *group;
    }

    root Group
    {
        string name;
        detail tasks Task.group;
    }
    
    event MarkDone
    {
        string taskURI;
    }
}
