<?php
use NGS\Client\RestHttp;

$http = RestHttp::instance();
$http->addSubscriber(function($event, $context) {
    if ($event==='request.sent') {
        print_r($context['response']['body']);
        echo '<br><br>';
    }
});
RestHttp::instance($http);
