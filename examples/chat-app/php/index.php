<?php
use Chat\User;
use Chat\Message;
use Chat\MessageView;

if (isset($_POST['message'])) {
    $msg = new Message();
    $msg->content = $_POST['message'];
    $user = User::find($_POST['userURI']);
    $msg->from = $user;
    $msg->persist();
} elseif (isset($_GET['uris'])) {
    $uris = explode(';', $_GET['uris']);
    $msgs = Chat\MessageView::find($uris);
    die(Chat\MessageViewJsonConverter::toJson($msgs));
    die;
} else {
    $user = new User();
    $user->persist();
}
?>
<div class="row-fluid">
<div class="span6">
    <div>You are user #<?=$user->URI?></div>
    <form method="post" data-ajax="1">
        <input type="text" name="message" placeholder="say something">
        <input type="hidden" name="userURI" value="<?=$user->URI?>"> <br/>
        <button class="btn" type="submit">Submit message</button>
    </form>
</div>
<div class="span6 chat-window">
    <ul class="unstyled"></ul>
</div>
</div>
