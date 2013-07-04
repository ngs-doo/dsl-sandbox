module Library
{
    root Book
    {
        string title;
        int number { sequence; }
        string[]? tags;
        Page[] pages;
    }

    entity Page
    {
        string content;
        Footnote[] ?notes;
    }

    value Footnote
    {
        string content;
    }
}
