<?php

require('./controller/common.php');

$HTTPMethod = $_SERVER['REQUEST_METHOD'];
if (!in_array($HTTPMethod, array('GET', 'POST', 'HEAD', 'PUT', 'DELETE', 'OPTIONS'))) {
    exit('Unsupport HTTP method');
}
$NotFound = true;
$HTTPParameters = array();
if (in_array($HTTPMethod, array('PUT', 'DELETE', 'OPTIONS'))) {
    parse_str(file_get_contents('php://input'), $HTTPParameters);
}


$ShortRequestURI = $_SERVER['REQUEST_URI'];
$HTTPMethod = $_SERVER['REQUEST_METHOD'];
$Routes = array();
$URLPath = '';

$Routes['GET']['/']                                                                        = 'home';
$Routes['GET']['/index']                                                                   = 'home';
$Routes['GET']['/login']                                                                   = 'login';
$Routes['GET']['/logout']                                                                  = 'logout';
$Routes['GET']['/register']                                                                = 'register';
$Routes['GET']['/profile/(?<action>modify|presentation)']                                  = 'profile';
$Routes['GET']['/activities/(?<action>my|ongoing|due|submit)']                             = 'activities';
$Routes['GET']['/groups/(?<action>my|all)']                                                = 'groups';

$Routes['GET']['/a/(?<id>[0-9]+)']                                                         = 'activity';
$Routes['GET']['/g/(?<id>[0-9]+)']                                                         = 'group';
$Routes['GET']['/t/(?<id>[0-9]+)']                                                         = 'topic';
$Routes['GET']['/u/(?<id>[0-9]+)']                                                         = 'user';
$Routes['GET']['/activities/new']                                                          = 'newActivity';
$Routes['GET']['/groups/new']                                                              = 'newGroup';
$Routes['GET']['/activity/invite']                                                         = 'invite';

$Routes['POST']['/login']                                                               = 'login';
$Routes['POST']['/register']                                                            = 'register';
$Routes['POST']['/activity/new']                                                        = 'newActivity';
$Routes['POST']['/activity/join']                                                       = 'activity';
$Routes['POST']['/activity/delete']                                                     = 'activities';
$Routes['POST']['/group/new']                                                           = 'newGroup';
$Routes['POST']['/group/join']                                                          = 'group';
$Routes['POST']['/user/follow']                                                         = 'relationship';
$Routes['POST']['/user/modify']                                                         = 'profile';
$Routes['POST']['/activity/invite']                                                     = 'invite';

foreach ($Routes as $Method => $SubRoutes) {
    if ($Method === $HTTPMethod) {
        $ParametersVariableName = '_' . $Method;
        foreach ($SubRoutes as $URL => $Controller) {
            if (preg_match("#^" . $URL . "$#i", $ShortRequestURI, $Parameters)) {
//                echo '<br><br><br><br><br><br><br><br>';
//                echo $URL;
//                foreach ($Parameters as $Key => $Value) {
//                    echo $Key." => ".$Value."<br>";
//                }
//                echo "122<br>";
                $NotFound = false;
                $Parameters = array_merge($Parameters, $HTTPParameters);
//                foreach ($HTTPParameters as $Key => $Value) {
//                    echo $Key." => ".$Value."<br>";
//                }
                foreach ($Parameters as $Key => $Value) {
                    if (!is_int($Key)) {
                        ${$ParametersVariableName}[$Key] = urldecode($Value);
                        $_REQUEST[$Key] = urldecode($Value);
                    }
                }
                $UrlPath = $Controller;
                break 2;
            }
        }
        break;
    }
}
require(__DIR__ . '/controller/' . $UrlPath . '.php');