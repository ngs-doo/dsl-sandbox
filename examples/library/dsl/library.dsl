module Library
{
    root Book
    {
        string title;
        int number { sequence; }

        // primitive collection, can be null
        string[]? tags;

        // complex references collection
        Page[] pages;
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

    sql BookSearch
        <# SELECT book.number, book.title
         FROM "Library"."Book" book
         ORDER BY 2 DESC #>
    {
        int number;
        string title;

        specification findByTitle 'it => it.title.StartsWith(query)'
        {
            string query;
        }
    }
}
