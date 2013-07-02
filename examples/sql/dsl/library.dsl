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

    sql BookSearch
        <# SELECT book."URI", book.number, book.title
         FROM "Library"."Book_roo" book
         ORDER BY 2 DESC #>
    {
        string URI;
        int number;
        string title;

        specification findByTitle 'it => it.title.StartsWith(query)'
        {
            string query;
        }
    }    
}
