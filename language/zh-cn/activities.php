<?php
//if (!defined('InternalAccess')) exit('error: 403 Access Denied');
if (empty($Lang) || !is_array($Lang))
    $Lang = array();

$Lang = array_merge($Lang, array(
    'Title' => '',
    'Title_my' => '我参加的活动',
    'Title_ongoing' => '进行中的活动',
    'Title_due' => '结束的活动',
    'Title_submit' => '我发布的活动',
));