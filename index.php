<?php
define("URL_BASE", "test/projects/random-profile/apiv1");
header('Content-Type: application/json; charset=utf-8');

use Pecee\SimpleRouter\SimpleRouter;
require_once "vendor/autoload.php";

SimpleRouter::get(URL_BASE.'/profile', function() {
    $profiles = new Aksoyih\RandomProfile\Profile();
    $profiles->setNumberOfProfiles(1);
    $profiles->createProfiles();

    http_response_code(200);
    return json_encode($profiles->getProfiles(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

SimpleRouter::get(URL_BASE.'/profile/{gender}', function($gender) {
    try {
        $profiles = new Aksoyih\RandomProfile\Profile();
        $profiles->setNumberOfProfiles(1);
        $profiles->setGender($gender);
        $profiles->createProfiles();
        http_response_code(200);
        $response = json_encode($profiles->getProfiles(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }catch (Error $e){
        if($e->getCode() == 1002){
            http_response_code(422);
            $response = json_encode(['error'=>"gender parameter expects to be either male or female", "example" => URL_BASE."/profile/male"]);
        }else{
            http_response_code(500);
            $response = json_encode(['error'=>"unexpected server error"]);
        }
    }

    return $response;
});

SimpleRouter::get(URL_BASE.'/profile/{gender}/{nProfiles}', function($gender, $nProfiles) {
    try {
        if($nProfiles <= 0 || $nProfiles >= 101){
            http_response_code(422);
            return json_encode(['error'=>"number of profiles parameter expects to be an integer between 1 and 100", "example" => URL_BASE."/profile/male/2"]);
        }

        $profiles = new Aksoyih\RandomProfile\Profile();
        $profiles->setNumberOfProfiles($nProfiles);
        $profiles->setGender($gender);
        $profiles->createProfiles();
        http_response_code(200);
        $response = json_encode($profiles->getProfiles(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }catch (Error $e){
        if($e->getCode() == 1002){
            http_response_code(422);
            $response = json_encode(['error'=>"gender parameter expects to be either male or female", "example" => URL_BASE."/profile/male"]);
        }else{
            http_response_code(500);
            $response = json_encode(['error'=>"unexpected server error", "example" => URL_BASE."/profile/male/1"]);
        }
    }

    return $response;
});

SimpleRouter::get(URL_BASE.'/404', function() {
    http_response_code(404);
    return json_encode(['error'=>"endpoint not found"]);
});

SimpleRouter::start();