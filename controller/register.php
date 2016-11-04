<?php

include("/view/register.html");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Email = Request('Post', 'email');
    $Content = Request('Post', 'password');

    echo $Email;
    echo $Content;
}