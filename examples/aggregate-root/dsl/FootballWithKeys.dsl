module Football
{
    root Team(ID)
    {
        int ID { sequence; }
        string name;
    }
    root Player(ID)
    {
        int ID { sequence; }
        string name;
        Team *team;
    }
}
