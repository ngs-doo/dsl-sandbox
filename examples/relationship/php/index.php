<?php
use Account\User;
use Account\Profile;
use Account\ProfileDetails;

$email = 'user.'.uniqid('', true).'@example.com'; // some random email

$user = new User();
$user->email = $email;

$profile = new Profile();
$profile->userEmail = $email;
$profile->description = 'my profile';

$profile->persist();
$user->persist();

// 
try {
    $user->profileRel;
} catch (Exception $ex) {
    // accessing Profile through User is not allowed
}

$details = ProfileDetails::find($user->email);

?>
Access properties from both aggregates through snowflake:
<ul>
    <li><em>Email</em>: <?=$details->email?></li>
    <li><em>userCreated</em>: <?=$details->userCreated?></li>
    <li><em>profileCreated</em>: <?=$details->profileCreated?></li>
</ul>
