# laravel-xhprof
安装

```git clone https://github.com/longxinH/xhprof.git ./xhprof
cd xhprof/extension/
phpize
./configure --with-php-config=/path/to/php7/bin/php-config
make && sudo make install
```

配置

添加配置项到php.ini
```
[xhprof]
extension=xhprof.so
xhprof.output_dir=/data/xhprof
```
这里的/data/xhprof 就是留存xhprof记录文件的目录

创建目录
```
mkdir -p /data/xhprof
```

重启fpm
```
centos
yum restart php-fpm

mac
brew services restart php-fpm
```

**laravel里面使用**

composer载入
```
composer require zehua/laravel-xhprof:dev-master
```

加入拦截器

在middlewareGroups里面web下面增加

\Zehua\LaravelXhprof\Middleware\StartXhprof::class

然后进行访问即可，在/data/xhprof下面就会出现每次访问run_id生成的文件
