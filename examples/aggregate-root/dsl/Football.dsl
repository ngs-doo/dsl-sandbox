module Football
{
    root Team
    {
        string name;
    }
    
    root Player
    {
        string name;
        Team *team;
    }

    root Match
    {
        Team *home;
        Team *guest;

        
    }
}
