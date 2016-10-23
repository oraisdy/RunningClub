<?php

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
$Routes['GET']['/register']                                                                = 'register';
$Routes['GET']['/activities']                                                              = 'activities';
$Routes['GET']['/groups']                                                                  = 'groups';
$Routes['GET']['/activity']                                                                = 'activity';
$Routes['GET']['/group']                                                                   = 'group';
$Routes['GET']['/user']                                                                    = 'user';
$Routes['GET']['/topic']                                                                   = 'topic';

foreach ($Routes as $Method => $SubRoutes) {
    if ($Method === $HTTPMethod) {
        $ParametersVariableName = '_' . $Method;
        foreach ($SubRoutes as $URL => $Controller) {
//            echo '<br> <br> <br> <br><br> <br> <br> <br>';
//            echo $URL." ".$ShortRequestURI."<br>";
//            echo strpos($ShortRequestURI, $URL).'<br>';
            if (preg_match("#^" . $URL . "$#i", $ShortRequestURI, $Parameters)) {
//            if (strpos($ShortRequestURI, $URL)!==false) {
//                echo $URL;
                $NotFound = false;
                $Parameters = array_merge($Parameters, $HTTPParameters);
                //var_dump($Parameters);
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