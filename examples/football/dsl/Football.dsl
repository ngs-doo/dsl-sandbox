module Football
{
    root Team
    {
        string name;

        history;
    }
    
    root Player
    {
        string name;
        Team *team;
    }
}
