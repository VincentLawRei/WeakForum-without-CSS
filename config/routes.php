<?php
return array (
    // Forum
    'forum/topic/(\d+)/newmessage' => 'forum/createMessage/$1',
    'forum/topic/(\d+)' => 'forum/topic/$1',
    'forum/createtopic' => 'forum/createTopic',
    'forum' => 'forum/index',

    // Main
    // 'reset' => 'user/reset',
    'signup' => 'user/register',
    'login' => 'user/login',
    'logout' => 'user/logout',
    'account' => 'account/index',
    '' => 'site/index'

)
 ?>
