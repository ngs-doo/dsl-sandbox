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
}
