module Analytics
{
    snowflake PostDataSource from Post
    {
        user.username;
        user.registeredOn;
        user.karma.postKarma userPostKarma;
        user.karma.commentKarma userCommentKarma;
        calculated int userAgeInMonths from 'it => (it.createdAt - it.registeredOn).TotalDays / 30';
        
        votes.upvotes;
        votes.downvotes;
        votes.balance votes;
        calculated isSpam from 'it => it.votes < 0';

        submittedAt;
        calculated date submittedOn from 'it => it.submittedAt.Date';
        calculated int submittedAtHour from 'it => it.submittedAt.Hour';
        
        //category.name as category;
        categoryID as category; //optimized version since it doesn't require join
        totalComments;
        link;
        title;
    }
    
    olap cube PostStats from PostDataSource
    {
        dimension username;
        dimension submittedOn;
        dimension submittedAtHour;
        dimension category;
        dimension link;
        dimension title;
        dimension userAgeInMonths;
        dimension isSpam;
        
        count link totalCount;
        avg totalComments avgComments;
        sum totalComments sumComments;
        sum upvotes sumUpvotes;
        sum downvotes sumDownvotes;
        sum votes sumVoteBalance;
        avg userPostKarma avgUserPostKarma;
        avg userCommentKarma avgUserCommentKarma;
        sum isSpam totalSpam;

        specification findInRange 
            'it => it.submittedAt >= after 
                && it.submittedAt < before.AddDays(1)
                && (string.IsNullOrEmpty(category) || category == it.category)
                && (withSpam == null || withSpam == it.isSpam)
                && (minimumUpvotes == null || it.upvotes >= minimumUpvotes)
                && (minimumComments == null || it.totalComments >= minimumComments)'
        {
            date after;
            date before;
            string? category;
            bool? withSpam;
            int? minimumUpvotes;
            int? minimumComments;
        }
    }
}