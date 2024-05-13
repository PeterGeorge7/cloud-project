<?php


require "../vendor/autoload.php";
define(__DIR__, basename(__FILE__));


$router = new App\Router();

$router->get("/home", [App\Classes\Team\Welcome::class, "view"]);
$router->get("/", [App\Classes\Team\Welcome::class, "view"]);

$router->get("/team/members", [App\Classes\Team\Members::class, "allmembers"]);

$router->get("/team/member/register", [App\Classes\Team\Members::class, "memberForm"]);
$router->post("/team/member/register", [App\Classes\Team\Members::class, "storeMember"]);

$router->get("/team/MemberRegistered", [App\Classes\Team\Members::class, "memberRegistered"]);

$router->post("/team/member/delete", [App\Classes\Team\Members::class, "deleteMember"]);

$router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
