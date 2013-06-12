module Todo
{
    root Task {
        string name;
        int priority;
        bool isDone;
        timestamp created;

        specification findDone 'it => it.isDone == true';
    }
}
