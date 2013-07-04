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

        specification findDone 'it => it.isDone == true';

        specification findByName 'it => it.name.StartsWith(query)'
        {
            string query;
        }

        specification findRecent '
            it =>  it.isDone == false
                && (minPriority == null || it.priority >= minPriority)
                && (maxPriority == null || it.priority <= maxPriority)
                && (it.created.AddDays(days) > DateTime.Today)'
        {
            int days;
            int? minPriority;
            int? maxPriority;
        }
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

        order by priority asc, name desc;
    }

    event MarkDone
    {
        string taskURI;
    }
}
