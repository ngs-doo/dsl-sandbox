module Account
{
    root User(email)
    {
        string email;
        date created;
        relationship profileRel(email) Profile(userEmail);
    }

    root Profile(userEmail)
    {
        string userEmail;
        string description;
        date created;
    }

    snowflake ProfileDetails User
    {
        email;
        created userCreated;
        profileRel.created profileCreated;
        profileRel.description;
   }
}