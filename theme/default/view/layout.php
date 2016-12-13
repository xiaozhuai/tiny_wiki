<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $BOOK["title"]; ?></title>
    <link  href="<?php echo $CONFIG["site_root"]; ?>theme/default/css/github-highlight.css" rel="stylesheet" type="text/css" />
    <link  href="<?php echo $CONFIG["site_root"]; ?>theme/default/css/github-markdown.css" rel="stylesheet" type="text/css" />
    <link  href="<?php echo $CONFIG["site_root"]; ?>theme/default/css/jquery-accordion-menu.css" rel="stylesheet" type="text/css" />
    <link  href="<?php echo $CONFIG["site_root"]; ?>theme/default/css/style.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo $CONFIG["site_root"]; ?>theme/default/js/highlight.pack.js" type="text/javascript"></script>
    <script src="<?php echo $CONFIG["site_root"]; ?>theme/default/js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="<?php echo $CONFIG["site_root"]; ?>theme/default/js/route.all.min.js" type="text/javascript"></script>
</head>

<body>
<div class="menu-side">
    <div id="book-menu" class="jquery-accordion-menu">
        <div class="jquery-accordion-menu-title"><?php echo $BOOK["title"]; ?></div>
        <div class="jquery-accordion-menu-header" id="form"></div>
        <ul id="book-menu-list">
            <?php

            function recursiveSubMenu($SUBMENU, $deep){
                echo '<ul class="submenu">';
                for($i=0; $i<count($SUBMENU); $i++){
                    $deepPath = "";
                    if($deep>1){
                        for($n=0; $n<$deep-1; $n++){
                            if($n==0){
                                $deepPath .= "│&nbsp;&nbsp;&nbsp;&nbsp;";
                            }else{
                                $deepPath .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            }
                        }

                    }

                    $gpath = $deepPath;
                    if($i == count($SUBMENU)-1){
                        $gpath .= "└─&nbsp;";
                    }else{
                        $gpath .= "├─&nbsp;";
                    }

                    echo '<li><a href="#'.$SUBMENU[$i]["route"].'">'.$gpath.$SUBMENU[$i]["title"].'</a>';
                    if(isset($SUBMENU[$i]["submenu"])){
                        recursiveSubMenu($SUBMENU[$i]["submenu"], $deep+1);
                    }
                    echo '</li>';
                }
                echo '</ul>';
            }

            for($i=0; $i<count($MENU); $i++){
                echo '<li><a href="#'.$MENU[$i]["route"].'">'.$MENU[$i]["title"].'</a>';
                if(isset($MENU[$i]["submenu"])){
                    recursiveSubMenu($MENU[$i]["submenu"], 1);
                }
                echo '</li>';
            }
            ?>
        </ul>
    </div>
</div>
<article class="content-side markdown-body">
</article>





<script type="text/javascript">
    var jsroute = route.route([
        J.stream(route.queryStringG,J.ctx("query"),route.nextp)
        ,J.stream(route.startP("/"),function(path) {
            $("#book-menu-list li.active").removeClass("active");
            $("a[href='#"+path+"']").parent().addClass("active");
            $(".content-side").html("<style type='text/css'>@-webkit-keyframes uil-default-anim { 0% { opacity: 1} 100% {opacity: 0} }@keyframes uil-default-anim { 0% { opacity: 1} 100% {opacity: 0} }.uil-default-css > div:nth-of-type(1){-webkit-animation: uil-default-anim 1s linear infinite;animation: uil-default-anim 1s linear infinite;-webkit-animation-delay: -0.5s;animation-delay: -0.5s;}.uil-default-css { position: relative;background:none;width:200px;height:200px;margin-left: calc( 50% - 100px );}.uil-default-css > div:nth-of-type(2){-webkit-animation: uil-default-anim 1s linear infinite;animation: uil-default-anim 1s linear infinite;-webkit-animation-delay: -0.375s;animation-delay: -0.375s;}.uil-default-css { position: relative;background:none;width:200px;height:200px;}.uil-default-css > div:nth-of-type(3){-webkit-animation: uil-default-anim 1s linear infinite;animation: uil-default-anim 1s linear infinite;-webkit-animation-delay: -0.25s;animation-delay: -0.25s;}.uil-default-css { position: relative;background:none;width:200px;height:200px;}.uil-default-css > div:nth-of-type(4){-webkit-animation: uil-default-anim 1s linear infinite;animation: uil-default-anim 1s linear infinite;-webkit-animation-delay: -0.125s;animation-delay: -0.125s;}.uil-default-css { position: relative;background:none;width:200px;height:200px;}.uil-default-css > div:nth-of-type(5){-webkit-animation: uil-default-anim 1s linear infinite;animation: uil-default-anim 1s linear infinite;-webkit-animation-delay: 0s;animation-delay: 0s;}.uil-default-css { position: relative;background:none;width:200px;height:200px;}.uil-default-css > div:nth-of-type(6){-webkit-animation: uil-default-anim 1s linear infinite;animation: uil-default-anim 1s linear infinite;-webkit-animation-delay: 0.125s;animation-delay: 0.125s;}.uil-default-css { position: relative;background:none;width:200px;height:200px;}.uil-default-css > div:nth-of-type(7){-webkit-animation: uil-default-anim 1s linear infinite;animation: uil-default-anim 1s linear infinite;-webkit-animation-delay: 0.25s;animation-delay: 0.25s;}.uil-default-css { position: relative;background:none;width:200px;height:200px;}.uil-default-css > div:nth-of-type(8){-webkit-animation: uil-default-anim 1s linear infinite;animation: uil-default-anim 1s linear infinite;-webkit-animation-delay: 0.375s;animation-delay: 0.375s;}.uil-default-css { position: relative;background:none;width:200px;height:200px;}</style><div class='uil-default-css' style='transform:scale(0.6);'><div style='top:80px;left:92px;width:16px;height:40px;background:#00b2ff;-webkit-transform:rotate(0deg) translate(0,-60px);transform:rotate(0deg) translate(0,-60px);border-radius:8px;position:absolute;'></div><div style='top:80px;left:92px;width:16px;height:40px;background:#00b2ff;-webkit-transform:rotate(45deg) translate(0,-60px);transform:rotate(45deg) translate(0,-60px);border-radius:8px;position:absolute;'></div><div style='top:80px;left:92px;width:16px;height:40px;background:#00b2ff;-webkit-transform:rotate(90deg) translate(0,-60px);transform:rotate(90deg) translate(0,-60px);border-radius:8px;position:absolute;'></div><div style='top:80px;left:92px;width:16px;height:40px;background:#00b2ff;-webkit-transform:rotate(135deg) translate(0,-60px);transform:rotate(135deg) translate(0,-60px);border-radius:8px;position:absolute;'></div><div style='top:80px;left:92px;width:16px;height:40px;background:#00b2ff;-webkit-transform:rotate(180deg) translate(0,-60px);transform:rotate(180deg) translate(0,-60px);border-radius:8px;position:absolute;'></div><div style='top:80px;left:92px;width:16px;height:40px;background:#00b2ff;-webkit-transform:rotate(225deg) translate(0,-60px);transform:rotate(225deg) translate(0,-60px);border-radius:8px;position:absolute;'></div><div style='top:80px;left:92px;width:16px;height:40px;background:#00b2ff;-webkit-transform:rotate(270deg) translate(0,-60px);transform:rotate(270deg) translate(0,-60px);border-radius:8px;position:absolute;'></div><div style='top:80px;left:92px;width:16px;height:40px;background:#00b2ff;-webkit-transform:rotate(315deg) translate(0,-60px);transform:rotate(315deg) translate(0,-60px);border-radius:8px;position:absolute;'></div></div>");
            $.get("?route="+path, function(result){
                $(".content-side").html(result);
            });
        })
    ]);
    J.dostream(null,route.hashMilldam,jsroute);
    //jsroute("/");
</script>


<script type="text/javascript">
    (function($) {
        $.expr[":"].Contains = function(a, i, m) {
            return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
        };
        function filterList(header, list) {
            //@header 头部元素
            //@list 无需列表
            //创建一个搜素表单
            var form = $("<form>").attr({
                "class":"filterform",
                action:"#"
            }), input = $("<input>").attr({
                "class":"filterinput",
                type:"text"
            });
            $(form).append(input).appendTo(header);
            $(input).change(function() {
                var filter = $(this).val();
                if (filter) {
                    console.log("filter: "+filter);
                    $matches = $(list).find("a:Contains(" + filter + ")").parent();
                    //console.log("matches: "+JSON.stringify($matches));
                    //$("li", list).not($matches).slideUp();
                    //$matches.parents("li").slideDown();
                    //$matches.slideDown();
                    $("li", list).not($matches).find("a").css({"color": "#f0f0f0"});
                    $matches.find("a").css({"color": "#5599ff"});

                } else {
                    console.log("no filter: "+filter);
                    //$(list).find("li").slideDown();
                    $(list).find("li").find("a").css({"color": "#f0f0f0"});
                }
                return false;
            }).keyup(function() {
                $(this).change();
            });
        }
        $(function() {
            filterList($("#form"), $("#book-menu-list"));
        });
    })(jQuery);
</script>

</body>
</html>