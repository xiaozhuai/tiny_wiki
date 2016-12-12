<?php

session_start();
$uri = explode("?", $_SERVER["REQUEST_URI"], 2);
$url = $uri[0];
$query = @$uri[1];
if($url!="/"){
    header("location: /?".$query);
    exit;
}

require_once __DIR__.'/Parsedown.php';
$Parsedown = new Parsedown();

define("BOOK_ROOT", __DIR__."/book");
$BOOK = json_decode(file_get_contents(BOOK_ROOT."/book.json"), true);

if(isset($BOOK["password"]) && $BOOK["password"]!="" && @$_SESSION["password"]!=$BOOK["password"]){
    require_once __DIR__."/login.php";
}else{
    if(isset($_GET["route"])){
        $route = $_GET["route"];
        $mdFile = null;
        if($route!="") {
            if (file_exists(BOOK_ROOT . $route . ".md")) {
                $mdFile = BOOK_ROOT . $route . ".md";
            } else if (file_exists(BOOK_ROOT . $route . "/index.md")) {
                $mdFile = BOOK_ROOT . $route . "/index.md";
            }else if (file_exists(BOOK_ROOT . "/404.md")) {  //找不到章节时，加载自定义的404页面
                $mdFile = BOOK_ROOT."/404.md";
            }
        }
        if($mdFile==null){                              //找不到章节时(包括404)，加载系统预设的404页面
            $mdContent = "# 404\n404 Not Found";
        }else{                                          //章节存在时，加载之
            $mdContent = file_get_contents($mdFile);
        }
        $mdHtml = $Parsedown->text($mdContent);
        echo $mdHtml;
        exit;
    }
    $MENU = $BOOK["menu"];
    require_once __DIR__."/main.php";
}
