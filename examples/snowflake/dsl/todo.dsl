module Todo
{
    root Task
    {
        string name;
        int priority;
        bool isDone;
        timestamp created;
    }

    snowflake TaskList Task
    {
        name;
        priority;
        isDone;

        order by priority asc, name desc;
    }
}
