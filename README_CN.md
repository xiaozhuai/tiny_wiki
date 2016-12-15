[[English Readme](README.md)]  [[中文文档](README_CN.md)]

# 关于
Tiny Wiki 是一个极简的在线文档中心, 它可以运行在现今流行的服务器环境上, 例如 apache+php 或 nginx+php

Under the [MIT License](LICENSE.md)

# 作者
+ xiaozhuai [xiaozhuai7@gmail.com](xiaozhuai7@gmail.com)

# 指南

## 配置
默认的配置文件在 `framework/config.default.json` , 如果需要修改配置, 只需要在项目目录下建立 `config.custom.json` 文件, 所有的配置项都可以被覆盖

* ***book_root*** --- 书记目录, 包含markdown文件, book.json, 甚至一个自定义的 404.md 文件

* ***site_root*** --- 站点目录, 例如，如果你将项目至于 `/var/www/wiki` 目录下, 你需要将其设置为 `/wiki`. 如果在 `/var/www`, 使用默认值 `/` 即可

* ***theme*** --- 主题目录, 你可以自己开发主题, 但需要注意的是, 主题至少包含 `view/layout.php` 和 `view/login.php` 模板文件，当然, 你可以自己写模板文件

* ***render_side*** --- 选择渲染端, 默认值 `client`
    1. server --- 在服务端渲染
    2. client --- 在浏览器(客户端)渲染

## 书籍设定

### book.json

* ***title*** --- 设置书名

* ***password*** --- 设置密码, 可以不设或为空, 即不需要密码

* ***duoshuo*** --- 设置多说标识, [duoshuo](http://duoshuo.com/) 是一个社会化评论插件， 如果你想关闭此功能，将此项设为空或不设即可

* ***menu*** --- 设置目录结构

### 404.md
设置自定义404页

## 关于路由

例如 /xxx, 会依次匹配下面的规则, 直到命中

1. xxx.md

2. xxx/index.md

3. 404.md

4. 默认404内容, 内容为:
```
# 404
404 Not Found
```

# 关于示例书籍
示例书籍来源于 [leetcode-solution](https://github.com/siddontang/leetcode-solution), 作者信息:
+ 陈心宇 [collectchen@gmail.com](collectchen@gmail.com)
+ 张晓翀 [xczhang07@gmail.com](xczhang07@gmail.com)
+ SiddonTang [siddontang@gmail.com](siddontang@gmail.com)

感谢！

# 最后
找一个前端小伙伴，由于本人前端能力有限，求小伙伴加入。

此项目纯属个人闲暇时间的作品，目标是极简，灵活，高度可配置。

联系QQ: 798047000