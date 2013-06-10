module Todo
{
    root Task {
        string name;
        bool isDone;
        timestamp created;

        specification findDone 'it => it.isDone == true';
    }
}