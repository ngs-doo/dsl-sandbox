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

    entity PlayerContract
    {
        Team *team;
        date signedOn;
        date expiry;
    }
}
