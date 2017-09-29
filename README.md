http://220.112.193.197/files/4000000001A46CD6/120.52.72.19/cdn.mysql.com/c3pr90ntc0td//Downloads/MySQL-5.6/mysql-5.6.31-winx64.zip


#3.mysql install
 
admin模式启动cmd
cd mysql目录/bin
执行安装： mysqld -install
 
启动mysql服务： net start mysql
关闭mysql服务： net stop mysql
 
#4.mysql 编码配置 <解压版MySQL-5.6.31-winx64 编码配置>
在根目录下面有已经写好的"my-"开头的ini文件，如：my-default.ini。复制一份，将文件名修改为my.ini，添加以下内容：


[mysqld]
#设置字符集为utf8
loose-default-character-set = utf8
character-set-server = utf8
basedir = 你的mysql路径
datadir = 你的mysql路径/data
 
 
[client]
#设置客户端字符集
default-character-set = utf8
PS:[client] 这一块添加到最后
 
 
#5. 修改Root密码
 
     1、通过mysql -u用户名 -p指定root用户登录MySQL，输入后回车会提示输入密码。
 
     2、修改MySQL的root用户密码，格式：mysql> set password for 用户名@localhost = password('新密码');
　　　　例子：mysql> set password for root@localhost = password('123456');
　　　　上面例子将用户root的密码更改为shapolang　；
 
     重新登录，输入新密码shapolang就ok了；
