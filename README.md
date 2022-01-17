# PHP SDK 接入指南 & CHANGELOG

## 接入指南

  1. PHP version >= 5.4 & curl extension support
  2. 通过composer安装SDK
  3. 创建Config配置类，填入key，secret和sandbox参数
  4. 使用sdk提供的接口进行开发调试
  5. 上线前将Config中$sandbox值设为false以及填入正式环境的key和secret
 

### 安装

```php
    composer require eleme-openapi/eleme-openapi-sdk
```

### 基本用法

```php
    use ElemeOpenApi\Config\Config;
    use ElemeOpenApi\Api\ShopService;
    
    //实例化一个配置类
    $config = new Config($app_key, $app_secret, false);
    
    //使用config和token对象，实例化一个服务对象
    $shop_service = new ShopService($token, $config);
    
    //调用服务方法，获取资源
    $shop = shop_service->get_shop(12345);

```

### Token获取
企业应用与个人应用的token获取方法略有不同。

实际使用过程中，在token获取成功后，该token可以使用较长一段时间，需要缓存起来，请勿每次请求都重新获取token。

#### 企业应用


```php
    use ElemeOpenApi\Config\Config;
    use ElemeOpenApi\OAuth\OAuthClient;
    
    //实例化一个配置类
    $config = new Config($app_key, $app_secret, false);
    
    //使用config对象，实例化一个授权类
    $client = new OAuthClient($config);
    
    //根据OAuth2.0中的对应state，scope和callback_url，获取授权URL
    $auth_url = $client->get_auth_url($state, $scope, $callback_url);  
```

商家打开授权URL，同意授权后，跳转到您的回调页面，并返回code

```php
    //通过授权得到的code，以及正确的callback_url，获取token
    $token = $client->get_token_by_code($code, $callback_url);
```


#### 个人应用

```php
    use ElemeOpenApi\Config\Config;
    use ElemeOpenApi\OAuth\OAuthClient;
    
    //实例化一个配置类
    $config = new Config($app_key, $app_secret, false);
    
    //使用config对象，实例化一个授权类
    $client = new OAuthClient($config);
    
    //使用授权类获取token
    $token = $client->get_token_in_client_credentials();
```


### Demo使用方法

该demo主要用来演示企业应用的授权流程和展示应用信息

1. 在开发者中心创建企业应用，记下沙箱环境店铺的账号和密码，并在沙箱环境中填入回调地址（该地址需要https）

2. 找到demo文件夹将资源拷贝到您的项目目录
```
    vendor/eleme-openapi/eleme-openapi-sdk/demo/
```

3. 在init.php中修改沙箱环境的app_key，app_secret，callback_url，以及项目目录的相对路径

```php
    define("ROOT_DIR", dirname(__FILE__) . "your project path");
    
    $app_key = "your app key";
    $app_secret = "your app secret";
    $sandbox = true;

    $scope = "all";
    $callback_url = "your callback url";
```

4. 将demo部署到服务器上

5. 打开SDK生成的授权URL，使用沙箱店铺的账号和密码进行授权，成功后调转回调接口，输出页面，展示店铺信息

6. 使用沙箱店铺的账号密码在napos客户端登陆，会发现刚刚授权的应用已安装，并能够打开应用跳转回调页，展示店铺信息


## CHANGELOG:

### [1.65.0]

    Release Date : 2021-09-18

- [Feature] 更新了金融服务
- [Feature] 更新了订单服务
- [Feature] 更新了商品服务


### [1.64.0]

    Release Date : 2021-07-08

- [Feature] 更新了商户数据服务
- [Feature] 更新了经营体检
- [Feature] 更新了金融服务
- [Feature] 更新了服务市场服务
- [Feature] 更新了消息服务
- [Feature] 新增了商家服务中台服务
- [Feature] 更新了订单服务
- [Feature] 更新了商品服务
- [Feature] 更新了招聘市场服务
- [Feature] 更新了店铺服务
- [Feature] 更新了订单评论服务


### [1.63.0]

    Release Date : 2021-01-12

- [Feature] 更新了活动服务
- [Feature] 更新了视频服务
- [Feature] 更新了服务市场服务
- [Feature] 更新了消息服务
- [Feature] 更新了订单服务
- [Feature] 更新了商品服务


### [1.62.0]

    Release Date : 2020-11-03

- [Feature] 更新了企业订餐商户服务
- [Feature] 更新了金融服务
- [Feature] 更新了订单服务


### [1.61.0]

    Release Date : 2020-04-24
- [Feature] 新增招聘市场服务、企业订单服务；订单服务更新接口

### [1.60.0]

    Release Date : 2020-03-30
- [Feature] 更新了商品服务


### [1.59.0]

    Release Date : 2019-12-27

- [Feature] 更新了金融服务


### [1.58.0]

    Release Date : 2019-12-23

- [Feature] 更新了店铺服务


### [1.57.0]

    Release Date : 2019-11-18

- [Feature] 更新了订单服务
- [Feature] 新增了商户信用分服务


### [1.56.0]

    Release Date : 2019-10-18

- [Feature] 修复requestId可能不和规范的问题


### [1.55.0]

    Release Date : 2019-09-26

- [Feature] 更新了活动服务


### [1.54.0]

    Release Date : 2019-09-01

- [Feature] 新增了经营体检


### [1.53.0]

    Release Date : 2019-07-19

- [Feature] 更新了服务市场服务

### [1.52.0]

    Release Date : 2019-07-09

- [Feature] 更新了消息服务


### [1.51.0]

    Release Date : 2019-06-28

- [Feature] 更新了视频服务



### [1.50.0]

    Release Date : 2019-05-17

- [Feature] 更新了店铺服务


### [1.49.0]

    Release Date : 2019-05-10

- [Feature] 更新了活动服务


### [1.48.0]

    Release Date : 2019-04-15

- [Feature] 更新了活动服务


### [1.47.0]

    Release Date : 2019-04-12

- [Feature] 更新了商户会员卡服务


### [1.46.0]

    Release Date : 2019-03-05

- [Feature] 更新了商品服务


### [1.45.0]

    Release Date : 2019-02-22

- [Feature] 餐厅入口流量服务下线接口


### [1.44.0]

    Release Date : 2019-01-03

- [Feature] 更新了商品服务

### [1.43.0]

    Release Date : 2018-12-28

- [Feature] 更新了服务市场服务
- [Feature] 更新了商品服务


### [1.42.0]

    Release Date : 2018-12-21

- [Feature] 更新了门店装修服务
- [Feature] 更新了订单评论服务


### [1.41.0]

    Release Date : 2018-12-07

- [Feature] 更新了订单服务


### [1.40.0]

    Release Date : 2018-11-30

- [Feature] 更新了店铺服务
- [Feature] requestId新增时间戳后缀


### [1.39.0]

    Release Date : 2018-11-15

- [Feature] 更新了活动服务
- [Feature] 更新了店铺服务


### [1.38.0]

    Release Date : 2018-10-17

- [Feature] 更新了活动服务
- [Feature] 更新了订单服务
- [Feature] 更新了订单评论服务


### [1.37.0]

    Release Date : 2018-09-29

- [Feature] 新增了商户数据服务
- [Feature] 更新了店铺服务


### [1.36.0]

    Release Date : 2018-09-21

- [Feature] 更新了商户会员卡服务
- [Feature] 更新了门店装修服务
- [Feature] 新增了短信服务


### [1.35.0]

    Release Date : 2018-09-14

- [Feature] 更新了订单服务


### [1.34.0]

    Release Date : 2018-09-07

- [Feature] 更新了活动服务
- [Feature] 更新了商品服务
- [Feature] 更新了店铺服务


### [1.33.0]

    Release Date : 2018-08-17

- [Feature] 更新了活动服务
- [Feature] 更新了商户会员卡服务


### [1.32.0]

    Release Date : 2018-08-03

- [Feature] 新增了商户会员卡服务
- [Feature] 新增了CPC竞价服务
- [Feature] 更新了订单服务


### [1.31.0]

    Release Date : 2018-07-27

- [Feature] 更新了订单服务
- [Feature] 更新了商品服务
- [Feature] 更新了店铺服务


### [1.30.0]

    Release Date : 2018-07-13

- [Feature] 更新了订单评论服务


### [1.29.0]

    Release Date : 2018-07-06

- [Feature] 更新了视频服务
- [Feature] 更新了商品服务
- [Feature] 上传视频接口封装

### [1.28.0]

    Release Date : 2018-06-28

- [Feature] 新增了视频服务
- [Feature] 新增了门店装修服务
- [Feature] 更新了订单服务
- [Feature] 更新了商品服务
- [Feature] 更新了店铺服务


### [1.27.0]

    Release Date : 2018-06-22

- [Feature] 更新了店铺服务


### [1.26.0]

    Release Date : 2018-06-08



### [1.25.0]

    Release Date : 2018-06-08

- [Feature] 更新了活动服务
- [Feature] 更新了订单服务


### [1.24.0]

    Release Date : 2018-05-18

- [Feature] 更新了活动服务
- [Feature] 更新了商品服务
- [Feature] 新增授权码换取OpenId接口


### [1.23.0]

    Release Date : 2018-03-23

- [Feature] 更新了活动服务
- [Feature] 新增了餐厅入口流量服务
- [Feature] 更新了订单服务
- [Feature] 更新了店铺服务


### [1.22.0]

    Release Date : 2018-02-02

- [Feature] 更新了活动服务


### [1.21.0]

    Release Date : 2018-01-18

- [Feature] 新增了服务市场服务
- [Feature] 更新了订单评论服务


### [1.20.0]

    Release Date : 2018-01-05

- [Feature] 更新了商品服务
- [Feature] 更新了店铺服务


### [1.19.0]

    Release Date : 2017-12-24

- [Feature] 更新了订单服务
- [Feature] 更新了订单评论服务


### [1.18.0]

    Release Date : 2017-12-01

- [Feature] 更新了金融服务
- [Feature] 更新了订单服务


### [1.17.0]

    Release Date : 2017-10-27

- [Feature] 更新了活动服务


### [1.16.0]

    Release Date : 2017-10-22

- [Feature] 更新了活动服务
- [Feature] 更新了商品服务
- [Feature] 更新了订单评论服务


### [1.15.0]

    Release Date : 2017-09-01



### [1.14.0]

    Release Date : 2017-09-01

- [Feature] 新增了活动服务
- [Feature] 更新了订单评论服务


### [1.13.0]

    Release Date : 2017-08-18

- [Feature] 更新了订单服务


### [1.12.0]

    Release Date : 2017-08-03

- [Feature] 更新了金融服务


### [1.11.0]

    Release Date : 2017-07-07

- [Feature] 更新了商品服务


### [1.10.0]

    Release Date : 2017-07-04

- [Feature] 新增了金融服务
- [Feature] 更新了订单服务
- [Feature] 更新了商品服务
- [Feature] 更新了店铺服务


### [1.9.0]

    Release Date : 2017-05-26

- [Feature] 更新了订单服务


### [1.8.0]

    Release Date : 2017-05-24

- [Feature] 更新了商户服务


### [1.7.0]

    Release Date : 2017-05-18

- [Feature] 更新了订单服务
- [Feature] 更新了商品服务


### [1.6.1]

    Release Date : 2017-05-12

- [Feature] 更新了订单服务
- [Feature] 更新了商品服务
- [Feature] 修复了demo的Util里，convert_to_message的json_decode有可能精度丢失的问题


### [v1.5.0]

    Release Date : 2017-5-8
    
- [Feature] 订单服务新增接口。
- [Feature] 商品服务新增接口。

### [v1.4.0]

    Release Date : 2017-5-5
    
- [Feature] 店铺服务新增接口。
- [Feature] 商品服务新增接口。
- [Feature] 新增签约服务。
    
    
### [v1.3.0]

    Release Date : 2017-4-25

- [Feature] 店铺服务新增接口。

### [v1.2.0]

    Release Date : 2017-4-21

- [Feature] 订单服务新增接口。
- [Feature] 商品服务新增接口。
- [Feature] 新增订单评论服务。

### [v1.1.10]

    Release Date : 2017-4-21

- [Feature] 修复了含有数组入参时，有可能造成的签名无效的问题。

### [v1.1.9]

    Release Date : 2017-4-14

- [Feature] 对部分字符集的入参进行了UTF8转换，修复了中文字符的签名有可能无法计算成功的问题。

### [v1.1.8]

    Release Date : 2017-4-11

- [BugFix] 修复了demo的HTML文件中，图片链接失效的问题

### [v1.1.7]

    Release Date : 2017-4-7

- [Feature] SDK完整实现
