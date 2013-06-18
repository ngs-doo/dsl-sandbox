module Todo
{
    root Task
    {
        string name;
        int priority;
        bool isDone;
        timestamp created;

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
}
