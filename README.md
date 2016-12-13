[[English Readme](README.md)]  [[中文文档](README_CN.md)]

# About
Tiny Wiki is a tiny document center, it can ru with most of current web env, such as apache+php and nginx+php

Under the [MIT License](LICENSE.md)

# Author
+ xiaozhuai [xiaozhuai7@gmail.com](xiaozhuai7@gmail.com)

# Guide

## Config
Default config file locate in `framework/config.default.json` , if you want to change it, just create a new file named `config.custom.json` in the project root dir, any thing can be override

* ***book_root*** --- The book dir, contains md files, and book.json, even with a custom 404.md file

* ***site_root*** --- Site root dir, it means if you put the project in  `/var/www/wiki`, you shoud give it `/wiki`. If in `/var/www`, it's `/` by default

* ***theme*** --- Theme dir, you can develop your themes, at least, it should contains `view/layout.php` and `view/login.php` model file

* ***render_side*** --- Choose a side to render menu and content, the default value is `client`
    1. server --- Render with server
    2. client --- Render with broswer

## Book Config

### book.json

* ***title*** --- Define the book title

* ***password*** --- Define the book password, can be empty

* ***menu*** --- Define the book menu struct

### 404.md
Set a custom 404 page

## About Route

for example /xxx, it will match these case until matched

1. xxx.md

2. xxx/index.md

3. 404.md

4. default 404 content, the content is:
```
# 404
404 Not Found
```

# About Sample Book
The sample book is from [leetcode-solution](https://github.com/siddontang/leetcode-solution), author:
+ 陈心宇 [collectchen@gmail.com](collectchen@gmail.com)
+ 张晓翀 [xczhang07@gmail.com](xczhang07@gmail.com)
+ SiddonTang [siddontang@gmail.com](siddontang@gmail.com)

Thanks！