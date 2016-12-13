# 关于

tiny wiki是一个极致轻巧的文档中心，使用markdown书写文档，部署简单，可在apache+php或nginx+php环境下轻松建立在线文档。

Under the [MIT License](LICENSE.md)

# 作者
+ xiaozhuai [xiaozhuai7@gmail.com](xiaozhuai7@gmail.com)

# 使用方法

## book.json

### title
定义文档标题

### password
加密密码，可为空

### menu
文档目录

## 404.md
自定义404页

# 关于路由
/xxx会优先匹配xxx.md，其次是xxx/index.md。如果二者都没有，则匹配到自定义的404页，即404.md。
如果没有自定义404页，则使用系统默认的404内容，即
```
# 404
404 Not Found
```

# 全局设定
默认的全局设定位 `framework/config.default.json` ，如果需要修改配置，请在项目目录下建立 `config.custom.json` 文件，所有的默认配置都可以被覆盖。

* book_root
配置书籍根目录，只能是相对于项目目录的相对路径，以/开头

* site_root
站点目录，相对于站点根目录的路径，例如项目放在 `/var/www/wiki` 下，则配置此项为 `/wiki`，
若在 `/var/www` 下，则为默认值 `/`

* theme
设置主题，每个主题都是 `theme` 下的一个文件夹。每个主题目录下必须包含 `view/layout.php` 和 `view/login.php` 模板文件。

* render_side
设置渲染端，默认值 `client`
    1. server 服务端渲染，书籍目录和篇章内容会在服务端渲染成html
    2. client 浏览器(客户端渲染)，书籍目录会以json形式传到浏览器，由浏览器生成html，书籍篇章内容会以markdown形式传到浏览器，浏览器解析markdown生成html

# 示例文档
项目中示例(leetcode-solution)文档来自github，原作者：

+ 陈心宇 [collectchen@gmail.com](collectchen@gmail.com)
+ 张晓翀 [xczhang07@gmail.com](xczhang07@gmail.com)
+ SiddonTang [siddontang@gmail.com](siddontang@gmail.com)

感谢！