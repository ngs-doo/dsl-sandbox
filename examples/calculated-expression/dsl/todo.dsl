module Todo
{
    root Task
    {
        string name;
        int priority;
        bool isDone;
        timestamp created;
        Group? *group;

        calculated isImportant from 'it => it.priority <= 1 && !it.isDone';
    }

    root Group
    {
        string name;
        detail tasks Task.group;
    }

    snowflake TaskList Task
    {
        name;
        priority;
        isDone;
        isImportant;
    }
}
