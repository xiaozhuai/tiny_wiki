# 关于

tiny wiki是一个极致轻巧的文档中心，使用markdown书写文档，部署简单，可在apache+php或nginx+php环境下轻松建立在线文档。

Under [MIT License](LICENSE.md)

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

## book_root
配置书籍根目录，只能是相对于项目目录的相对路径，以/开头

## force_redirect
强制重定向会将所有的非静态资源的访问重定向到index.php，开启重定向需要配置 `force_redirect` 为 `true` ，并且重命名项目目录下的__htaccess为.htaccess。
如果服务端不是apache环境，则可根据服务器自行配置重定向规则

## site_root
站点目录，相对于站点根目录的路径，例如项目放在 `/var/www/wiki` 下，则配置此项为 `/wiki`，
若在 `/var/www` 下，则为默认值 `/`

## theme
设置主题，每个主题都是 `theme` 下的一个文件夹。每个主题目录下必须包含 `view/layout.php` 和 `view/login.php` 模板文件。

# 示例文档
项目中示例(leetcode-solution)文档来自github，原作者：

+ 陈心宇 [collectchen@gmail.com](collectchen@gmail.com)
+ 张晓翀 [xczhang07@gmail.com](xczhang07@gmail.com)
+ SiddonTang [siddontang@gmail.com](siddontang@gmail.com)

感谢！