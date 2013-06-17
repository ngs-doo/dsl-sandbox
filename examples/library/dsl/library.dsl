module Library
{
    root Book
    {
        string title;
        int number { sequence; }

        // primitive collection, can be null
        string[]? tags;

        // collection with null values:
        // string?[]? tags;

        // complex references collection
        Page[] *pages;
    }

    entity Page
    {
        string content;

        // complex collection of values
        Footnote[] ?notes;
    }

    value Footnote
    {
        string content;
    }
}
