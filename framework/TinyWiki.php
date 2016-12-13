<?php
/**
 * Created by PhpStorm.
 * User: xiaozhuai
 * Date: 16/12/13
 * Time: 上午11:06
 */

class TinyWiki
{

    public  $configs;
    private $book;
    private $book_root;
    private $view_root;

    function __construct($customConfigFile)
    {
        $this->configs = json_decode(file_get_contents(__DIR__."/config.default.json"), true);      //load default configs
        $customConfigs = json_decode(@file_get_contents($customConfigFile), true);                  //load custom configs
        if($customConfigs!=null) {
            foreach ($this->configs as $key => $value) {                                            //override default configs
                if (isset($customConfigs[$key])) {
                    $this->configs[$key] = $customConfigs[$key];
                }
            }
        }
        $this->normalizeConfig();
        $this->book_root = __DIR__ . "/../".$this->configs["book_root"];
        $this->view_root = __DIR__ . "/../theme/".$this->configs["theme"] . "/view";
    }

    private function normalizeConfig(){
        if(substr($this->configs["book_root"], -1)=="/"){
            $this->configs["book_root"] = substr($this->configs["book_root"], 0, -1);               //remove / if end with /
        }
        if(substr($this->configs["site_root"], -1)!="/"){
            $this->configs["site_root"] = $this->configs["site_root"]."/";                          //add / if not end with /
        }
        //var_dump($this->configs);
    }

    private function forceRedirect(){
        $tmp = explode("?", $_SERVER["REQUEST_URI"], 2);    //parse uri to url(not include domain) and query args
        $uri = array(
            "url"   => @$tmp[0],
            "query" => @tmp[1]
        );
        if ($uri["url"] != "/") {                           //cause all request should be redirect to /
            header("location: /?" . $uri["query"]);
            exit;
        }
    }

    private function parseMarkdownFile($file){
        return $this->parseMarkdownText(file_get_contents($file));
    }

    private function parseMarkdownText($text){
        require_once __DIR__ . '/vendor/Parsedown.php';     //for parse markdown
        $Parsedown = new Parsedown();
        return $Parsedown->text($text);
    }

    private function noPermission(){
        return
                isset($this->book["password"])
                && $this->book["password"] != ""
                && @$_SESSION["password"] != $this->book["password"];
    }

    private function login(){
        $CONFIG = $this->configs;
        $ERR_MSG = "";
        if(isset($_POST["password"])){
            if(!isset($this->book["password"]) || $this->book["password"]=="" || $this->book["password"]==$_POST["password"]){
                $_SESSION["password"] = @$this->book["password"];
                header("location: .");
                exit;
            }else{
                $ERR_MSG = "Password Incorrect";
            }
        }
        require_once $this->view_root . "/login.php";
    }

    private function replyContent(){
        $route = $_GET["route"];
        $mdFile = null;
        if ($route != "") {
            if (file_exists($this->book_root . $route . ".md")) {                  //if exist ${route}.md, use it
                $mdFile = $this->book_root . $route . ".md";
            } else if (file_exists($this->book_root . $route . "/index.md")) {     //if exist ${route}/index.md, use it
                $mdFile = $this->book_root . $route . "/index.md";
            } else if (file_exists($this->book_root . "/404.md")) {                //if both them not exist, use custom 404.md in book root
                $mdFile = $this->book_root . "/404.md";
            }
        }
        if ($mdFile == null) {                                                                //if the book donnot provide a 404.md
            $mdHtml = $this->parseMarkdownText("# 404\n404 Not Found");                       //then use the default 404 content
        } else {
            $mdHtml = $this->parseMarkdownFile($mdFile);
        }
        echo $mdHtml;                                                                         //reply
    }

    private function layout(){
        $CONFIG = $this->configs;
        $BOOK   = $this->book;
        $MENU   = $this->book["menu"];
        require_once $this->view_root . "/layout.php";
    }

    private function switchMode(){                          //login mode, content reply mode, layout mode
        if ($this->noPermission()) {                        //go login mode if no permission
            $this->login();
        } else {                                            //has permission
            if (isset($_GET["route"])) {                    //request a content if query arg route is set, so go content reply mode
                $this->replyContent();
            }else{
                $this->layout();
            }
        }
    }

    public function go()
    {
        session_start();
        if($this->configs["force_redirect"]){
            $this->forceRedirect();
        }
        $this->book = json_decode(file_get_contents($this->book_root . "/book.json"), true);     //load book defined in config
        $this->switchMode();
    }

}