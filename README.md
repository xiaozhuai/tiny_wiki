# 关于

tiny wiki是一个极致轻巧的文档中心，使用markdown书写文档，部署简单，可在apache+php或nginx+php环境下轻松建立在线文档。


# 作者
+ xiaozhuai [xiaozhuai7@gmail.com](xiaozhuai7@gmail.com)

# 使用方法

## book/book.json

### title
定义文档标题

### password
加密密码，可为空

### menu
文档目录

## 404.md
自定义404页

# 关于路由
/xxx会优先匹配/book/xxx.md，其次是/book/xxx/index.md。如果二者都没有，则匹配到自定义的404页，即/book/404.md。
如果没有自定义404页，则使用系统默认的404内容，即
```
# 404
404 Not Found
```

# 示例文档
项目中示例(leetcode-solution)文档来自github，原作者：

+ 陈心宇 [collectchen@gmail.com](collectchen@gmail.com)
+ 张晓翀 [xczhang07@gmail.com](xczhang07@gmail.com)
+ SiddonTang [siddontang@gmail.com](siddontang@gmail.com)

感谢！