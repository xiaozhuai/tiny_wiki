<?php
if(isset($_POST["password"])){
    if(!isset($BOOK["password"]) || $BOOK["password"]=="" || $BOOK["password"]==$_POST["password"]){
        $_SESSION["password"] = $BOOK["password"];
        header("location: /?".$query);
        exit;
    }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>请输入文档密码</title>
    <link rel="stylesheet" type="text/css" href="/public/css/style-login.css" />
    <script src="/public/js/jquery-1.11.2.min.js" type="text/javascript"></script>
</head>
<body>
<form id="book-login" method="post">
    <input type="password" name="password" class="placeholder" placeholder="请输入文档密码">
    <input type="submit" value="确定">
</form>
</body>
</html>