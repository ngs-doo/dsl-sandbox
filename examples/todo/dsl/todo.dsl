module Todo
{
    root Task {
        string name;
        bool isDone;

        specification findDone 'it => it.isDone == true';
    }
}