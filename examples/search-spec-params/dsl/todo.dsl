module Todo
{
    root Task
    {
        string name;
        int priority;
        bool isDone;
        timestamp created;
        Group? *group;

        specification findByName 'it => it.name.StartsWith(query)'
        {
            string query;
        }
    }
}
