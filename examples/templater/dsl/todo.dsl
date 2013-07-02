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

        specification findByName 'it => it.name.StartsWith(query)'
        {
            string query;
        }
    }

    root Group
    {
        string name;
        detail tasks Task.group;
    }
}
