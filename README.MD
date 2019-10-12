# ThinkPHP学习
### 1、版本选择
* （1）目前在TP的官网有两个大版本5.x及3.x版本
* （2）5.x版本主要针对写接口使用的，如给Android以及IOS及前后端分离设计接口使用
* （3）3.x版本主要针对写web项目使用，如官网、电商网站等
* （4）这两个版本还对应完整版和核心版本，一般在项目中使用完整版本，因为功能更多
### 2、相关目录介绍
```
TP框架目录介绍        
+-- Application       --默认的应用代码存储目录
|   +-- Common          --所有模块的公共模块（前后台应用的公共模块，实际项目中设置为不能访问）
|   +-- Home            --前台模块
|   |   +-- Common        --存储当前模块下的函数
|   |   +-- Conf          --当前模块下的配置信息
|   |   +-- Controller    --当前模块下的控制器
|   |   +-- Model         --当前模块下的模型
|   |   +-- View          --当前模块下的视图
|   |   +-- index.html    --当前模块下的安全文件，防止用户直接访问该目录
|   +-- Runtime         --具体项目运行中的临时存储的地址（实际项目中设置为不能访问）
+-- Public            --默认的存储静态资源的目录
+-- ThinkPHP          --TP框架的源代码
|   +-- Common          --TP公共函数存放目录
|   +-- Conf            --TP默认配置项
|   +-- Lang            --TP的语言包
|   +-- Lang            --TP的语言包
|   +-- Library         --TP的核心源码库
|   |   +-- Behavior      --TP的行为
|   |   +-- Org           --TP的第三方扩展库
|   |   +-- Think         --TP的核心类文件
|   |   +-- Vendor         --TP某些核心类文件
|   +-- Model           --TP的模式支持
|   +-- Tpl             --TP默认的系统模板
|   +-- ThinkPHP.php    --TP框架的入口，通过引入该文件，即可载入TP框架
+-- .htaccess         --Apache的重写规则文件
+-- composer.json     --PHP包管理工具的配置文件
+-- index.php         --代表整个项目的入口文件，具体调度TP的源代码
```
### 3、定义应用的相关规则
* （1）使用TP框架，其应用的存储常量名必须为：APP_PATH
* （2）控制器的命名规则：控制器名称（首字母大写）+controller+.class.php
* （3）控制器必须放在各个目录的controller目录下
### 4、创建控制器的流程
* （1）设置命名空间
* （2）引入TP的控制器基类
* （3）创建自己的控制器类
* （3）创建自己的方法
### 5、TP框架中四种URL访问模式介绍
* （1）TP的默认方式访问格式(普通模式），次模式没有任何限制条件，在任何情况下都能使用
    > * 通俗的访问地址是：`http://www.tp.com/Index.php?m=Admin&c=Index&a=test`
* （2）pathinfo模式（注意：此模式需要服务器软件支持，目前不支持的只有nginx）：此模式在访问的地址格式上看起来比较像访问某一个目录下的文件，此模式比较符合搜索引擎优化
    > * 通俗的访问地址是：`http://www.tp.com/Index.php/Admin/Index/test/name/value`
    > * Admin：指定具体的模块名称
    > * Index：指定具体的控制器名称
    > * index：指定具体的控制器里面的方法名称
    > * name：具体参数名称
    > * value：具体参数值
* （3）重写模式：重写模式在pathinfo的基础之上增加一个重写的规则（需要web服务器提供具体的重写规则），对于重写模式，一般使用在隐藏项目的入口文件（主要用来隐藏项目的入口文件，提高安全）
    > * 注意：对于重写模式，具体的访问格式不固定，受具体的重写规则文件的影响
    > * 通俗的访问地址是：`http://www.tp.com/Admin/Index/test/name/value`
    > * 注意：如果使用phpstudy搭建服务器环境访问时出现No input file specified，有以下两个方式解决：
    >> * A：如果你的PHP版本是带NTS结尾的，那么请把.htaccess文件中的^(.*)$ index.php后面加个?号（^(.*)$ index.php?），变成伪静态规则即可
    >> * B：把PHP版本改成无NTS结尾的
* （4）兼容模式：为了确保想要使用pathinfo模式，但是web服务器又不支持此模式时使用，对于兼容模式同样时通过给入口文件传参数实现，默认情况下兼容模式传递s参数来指定模块、控制器、方法名称
    > * 通俗的访问地址是：`http://www.tp.com/index.php?s=/Admin/Index/test`
### 6、TP的调试模式
* （1）TP的调试模式其实就是控制了TP关于配置信以及函数的缓存功能
* （2）如果开启调试模式，每次访问项目，TP都会去加载最新的配置以及函数信息
* （3）如果关闭了调试模式，当第一次访问TP会将配置以及函数信息保存到一个文件中（common-runtime.php文件中),后续访问时就会每次直接读取该文件中保存的各种信息而不去加载最新的配置信息
* （4）建议在开发阶段开启调试模式（在入口文件index.php中的`define('APP_DEBUG',false)`此处进行配置
* （5）开启调试模式后能够使用最新的配置信息，且当代码出错时在调试模式下能够看到具体的错误信息
* （6）如果项目需要上线，建议一定要关闭调试模式，减少日志文件的生成，且代码出错时只会提示并不提示具体的错误位置，保证安全
* （7）如果爆出的错误是TP框架的文件，那么错误原因可能是环境因数导致的，一般框架是不可能出现大错误的
* （8）如果爆出的错误是自己定义的代码文件，那么一定是自己的代码写错了
### 7、TP中配置文件的位置（有三处）
* （1）TP默认的惯例配置文件：ThinkPHP\Conf\convention.php
* （2）公共模块的配置文件：\Application\Common\Conf\config.php
* （3）模块配置文件：\Application\Home\Conf\config.php
* （4）配置文件的优先级：模块配置>公共模块的配置文件>TP默认的惯例配置文件
* （5）C函数是TP提供的一个获取配置信息（传递一个参数）、临时设置配置信息（传递两个参数）的重要函数
* （6）实际开发中不要直接修改TP默认配置项中的配置，如果要修改，可用覆盖的方式修改（即是修改公共模块配置及应用配置模块即可）
### 8、TP的URL生成函数U的使用
* （1）默认生成的是pathinfo模式的URL地址
* （2）如果未指定模块，其会自动加上默认启动的应用模块及控制器
* （3）修改配置文件的'URL_MODEL'的值，可修改生成的URL访问模式,可选参数0、1、2、3,代表以下四种模式：
   > * 0 (普通模式);
   > * 1 (PATHINFO 模式);
   > * 2 (REWRITE  模式) ——重写模式; 
   > * 3 (兼容模式)  默认为PATHINFO 模式
### 9、页面跳转提示
* 使用TP的控制器基类里面的$this->success及$this->error函数即可
* 其默认提示的html模板是可用修改的，在ThinkPHP的Tpl文件夹下面的dispatch_jump.tpl文件修改即可
### 10、页面重定向
* 使用TP的控制器基类里面的$this->redirect函数即可
### 11、空操作
* （1）当用户访问某一个控制器下的不存在的方法，TP会自动的将执行当前控制器下对应的_empty方法，此机制就是空操作
* （2）只需要在控制器中重写empty()方法，如果找不到相应的控制器函数，其就会自动调用
### 12、空控制器
* （1）当用户访问一个不存在的控制器时，TP会自动执行空控制器下的对用方法，此机制就是空控制器
* （2）使用：只需要在放置控制器的文件夹中创建一个EmptyController.class控制器，再在空控制器中创建一个空操作函数即可提高用户体验
* （3）如果空控制器中不存在要访问的方法，就是执行空操作函数