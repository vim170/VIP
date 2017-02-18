/*
Navicat MariaDB Data Transfer

Source Server         : shane
Source Server Version : 100021
Source Host           : localhost:3306
Source Database       : vip

Target Server Type    : MariaDB
Target Server Version : 100021
File Encoding         : 65001

Date: 2017-02-18 16:41:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员编号',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `pw` char(128) NOT NULL DEFAULT '' COMMENT '密码',
  `atime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `ltime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员信息列表';

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for ads
-- ----------------------------
DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告列表编号',
  `position` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '广告位置: 1 为 首页头部广告 2为首页公告栏广告 3 所有页面尾部显示 4 所有页面头部显示 5 焦点图位置显示',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '广告图片位置',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '广告链接位置',
  `ord` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '广告启用状态：1 为启用 2为禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='广告列表';

-- ----------------------------
-- Records of ads
-- ----------------------------

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章列表',
  `cid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章分类列表',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '文章标题',
  `content` text NOT NULL COMMENT '文章内容',
  `atime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章列表\r\n底部五个模块\r\n服务保障\r\n购物指南\r\n售后服务\r\n支付方式\r\n配送方式';

-- ----------------------------
-- Records of article
-- ----------------------------

-- ----------------------------
-- Table structure for article_cate
-- ----------------------------
DROP TABLE IF EXISTS `article_cate`;
CREATE TABLE `article_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章分类列表',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级编号',
  `cname` varchar(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  `path` varchar(64) NOT NULL DEFAULT '' COMMENT '分类层级关系',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章分类列表';

-- ----------------------------
-- Records of article_cate
-- ----------------------------

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '品牌编号',
  `navid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '频道列表编号',
  `brandname` varchar(32) NOT NULL DEFAULT '' COMMENT '品牌名称',
  `brandcontent` text NOT NULL COMMENT '品牌内容',
  `countdown` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '品牌专场倒计时',
  `atime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '品牌创建时间',
  `state` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0为特卖会 1为预售  ',
  `isnew` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '品牌是否参加新品特卖：0为不参加 1 为参加',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '品牌启用：0为启用 1为禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='品牌表\r\n该表主要用来存储商城品牌';

-- ----------------------------
-- Records of brand
-- ----------------------------

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '购物车编号',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户编号',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品编号',
  `pnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '购买数量',
  `atime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '购物时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='购物车表\r\n用来存储购物车信息';

-- ----------------------------
-- Records of cart
-- ----------------------------

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品评论id',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户列表',
  `pid` int(10) NOT NULL DEFAULT '0' COMMENT '商品标号',
  `content` varchar(255) DEFAULT '' COMMENT '评论内容',
  `atime` int(10) unsigned DEFAULT '0' COMMENT '评论时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品评论表\r\n存储商品评论信息';

-- ----------------------------
-- Records of comment
-- ----------------------------

-- ----------------------------
-- Table structure for consult
-- ----------------------------
DROP TABLE IF EXISTS `consult`;
CREATE TABLE `consult` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '咨询编号',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户编号',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品编号',
  `comment` varchar(255) DEFAULT '' COMMENT '咨询内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品咨询表\r\n用来存储相关咨询信息';

-- ----------------------------
-- Records of consult
-- ----------------------------

-- ----------------------------
-- Table structure for favorite
-- ----------------------------
DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '收藏id',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户编号',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品编号',
  `brandid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '品牌编号',
  `atime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='收藏表\r\n存储用户的收藏商品 、品牌信息';

-- ----------------------------
-- Records of favorite
-- ----------------------------

-- ----------------------------
-- Table structure for feedback
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '反馈编号',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户编号',
  `issueid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '问题编号',
  `atime` int(10) unsigned DEFAULT '0' COMMENT '反馈时间',
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '问题解决状态：0 为待解决 1为已解决',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='反馈列表\r\n存储用户相关反馈信息';

-- ----------------------------
-- Records of feedback
-- ----------------------------

-- ----------------------------
-- Table structure for frilinks
-- ----------------------------
DROP TABLE IF EXISTS `frilinks`;
CREATE TABLE `frilinks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '友情链接编号',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '友情链接名称',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '友情链接标题',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '友情链接图片',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '友情链接地址',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '友情链接状态：1为启用 2 为禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of frilinks
-- ----------------------------

-- ----------------------------
-- Table structure for iplog
-- ----------------------------
DROP TABLE IF EXISTS `iplog`;
CREATE TABLE `iplog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'IP地址编号',
  `ip` varchar(32) NOT NULL COMMENT 'ip地址',
  `atime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '记录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ip日志表';

-- ----------------------------
-- Records of iplog
-- ----------------------------

-- ----------------------------
-- Table structure for issues
-- ----------------------------
DROP TABLE IF EXISTS `issues`;
CREATE TABLE `issues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '问题列表编号',
  `cid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '问题分类编号',
  `titile` varchar(32) NOT NULL DEFAULT '' COMMENT '问题标题',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '问题内容',
  `atime` int(10) unsigned DEFAULT '0' COMMENT '问题创建时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0 为待编辑   1位已编辑',
  `IsCommon` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '设置为常见问题：0为未设置  1为设置',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='反馈的问题';

-- ----------------------------
-- Records of issues
-- ----------------------------

-- ----------------------------
-- Table structure for issues_cate
-- ----------------------------
DROP TABLE IF EXISTS `issues_cate`;
CREATE TABLE `issues_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '问题分类编号',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级分类编号',
  `cname` varchar(10) NOT NULL DEFAULT '' COMMENT '分类名称',
  `path` varchar(64) NOT NULL DEFAULT '' COMMENT '分类间层级关系',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='问题分类表\r\n售后问题  订单问题等';

-- ----------------------------
-- Records of issues_cate
-- ----------------------------

-- ----------------------------
-- Table structure for navs
-- ----------------------------
DROP TABLE IF EXISTS `navs`;
CREATE TABLE `navs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '频道列表编号',
  `navname` varchar(32) NOT NULL DEFAULT '' COMMENT '频道名称',
  `order` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '频道列表排序',
  `atime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '频道创建时间',
  `enable` tinyint(1) DEFAULT '0' COMMENT '频道启用：0为启用 1为禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='频道列表\r\n导航栏内容';

-- ----------------------------
-- Records of navs
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单编号',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户编号',
  `countmoney` decimal(10,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '订单总金额',
  `productmoney` decimal(10,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '商品总金额',
  `payway` tinyint(1) NOT NULL DEFAULT '1' COMMENT '支付方式:1为支付宝  2 为货到付款 3 为转账',
  `state` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '订单状态:1为待处理 2为待发货 3为已发货 4为已收货 5为已取消',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '订单留言',
  `wlname` varchar(10) NOT NULL DEFAULT '' COMMENT '物流名称',
  `wlmoney` decimal(5,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '物流运费',
  `atime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下单时间',
  `ptime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '付款时间',
  `stime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发货时间',
  `uname` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `usname` varchar(20) NOT NULL DEFAULT '' COMMENT '收货人手机',
  `uphone` varchar(14) NOT NULL DEFAULT '' COMMENT '收货人姓名',
  `utel` varchar(255) NOT NULL DEFAULT '' COMMENT '收货人固定电话',
  `uaddress` varchar(255) DEFAULT '' COMMENT '收货地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表\r\n存储订单信息';

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for orders_data
-- ----------------------------
DROP TABLE IF EXISTS `orders_data`;
CREATE TABLE `orders_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单明细编号',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品编号',
  `oid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单编号',
  `pname` varchar(255) NOT NULL DEFAULT '' COMMENT '商品名称',
  `pmoney` decimal(10,1) NOT NULL DEFAULT '0.0' COMMENT '商品金额',
  `pnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '购买数量',
  `plogo` varchar(255) NOT NULL DEFAULT '' COMMENT '图片地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单详情表\r\n存储显示每个商品的订单信息';

-- ----------------------------
-- Records of orders_data
-- ----------------------------

-- ----------------------------
-- Table structure for payway
-- ----------------------------
DROP TABLE IF EXISTS `payway`;
CREATE TABLE `payway` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '支付方式编号',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '支付名称',
  `desc` varchar(255) NOT NULL DEFAULT '' COMMENT '支付方式描述',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '支付方式logo',
  `config` text NOT NULL COMMENT '支付配置',
  `ord` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '显示排序',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '支付方式启用状态：1为启用  2 为禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='支付方式';

-- ----------------------------
-- Records of payway
-- ----------------------------

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品编号',
  `cid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品分类编号',
  `brandid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品品牌编号',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '商品名称',
  `productcontent` text NOT NULL COMMENT '商品描述',
  `productdesc` varchar(255) NOT NULL DEFAULT '' COMMENT '商品描述',
  `goodprice` decimal(10,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '商品原价',
  `disprice` decimal(10,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '折扣价',
  `wlmoney` decimal(5,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '物流运费',
  `goodsmark` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品货号',
  `goodsreper` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品库存',
  `goodssellnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品销售数',
  `restrictnums` int(10) unsigned NOT NULL DEFAULT '12' COMMENT '最大限购数',
  `clicknums` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品点击数',
  `favornums` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品收藏数',
  `comnums` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品评论数',
  `consultnums` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品咨询数',
  `isspecial` tinyint(1) unsigned DEFAULT '0' COMMENT '是否参与活动：0 为不参与 1为参与',
  `atime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品添加时间',
  `qualification` varchar(20) NOT NULL DEFAULT '' COMMENT '商品规格',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '商品状态：1为出售中的商品  2为 下架商品',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品表\r\n存储商品详细信息';

-- ----------------------------
-- Records of product
-- ----------------------------

-- ----------------------------
-- Table structure for product_cate
-- ----------------------------
DROP TABLE IF EXISTS `product_cate`;
CREATE TABLE `product_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品分类编号',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级编号',
  `cname` varchar(20) NOT NULL DEFAULT '' COMMENT '商品分类名称',
  `path` varchar(64) NOT NULL DEFAULT '' COMMENT '分类之间的层级关系',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品分类表';

-- ----------------------------
-- Records of product_cate
-- ----------------------------

-- ----------------------------
-- Table structure for product_gallery
-- ----------------------------
DROP TABLE IF EXISTS `product_gallery`;
CREATE TABLE `product_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品编号',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '商品图片',
  `thums` varchar(255) NOT NULL DEFAULT '' COMMENT '商品大图',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '商品缩略图',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品图片库';

-- ----------------------------
-- Records of product_gallery
-- ----------------------------

-- ----------------------------
-- Table structure for replycom
-- ----------------------------
DROP TABLE IF EXISTS `replycom`;
CREATE TABLE `replycom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论编号',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户编号',
  `commentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论id',
  `adminid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '管理员编号',
  `replycontent` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复内容',
  `replytime` int(10) unsigned DEFAULT '0' COMMENT '回复时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品评论回复信息';

-- ----------------------------
-- Records of replycom
-- ----------------------------

-- ----------------------------
-- Table structure for replyfeed
-- ----------------------------
DROP TABLE IF EXISTS `replyfeed`;
CREATE TABLE `replyfeed` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adminid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '管理员id',
  `feedid` int(10) NOT NULL DEFAULT '0' COMMENT '反馈编号',
  `replycontent` varchar(255) NOT NULL DEFAULT '' COMMENT '回复内容',
  `replytime` int(10) NOT NULL DEFAULT '0' COMMENT '回复时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='反馈回复表';

-- ----------------------------
-- Records of replyfeed
-- ----------------------------

-- ----------------------------
-- Table structure for scan
-- ----------------------------
DROP TABLE IF EXISTS `scan`;
CREATE TABLE `scan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '浏览记录编号',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品编号',
  `atime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户的浏览信息';

-- ----------------------------
-- Records of scan
-- ----------------------------

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '网站设置编号',
  `skey` varchar(255) NOT NULL DEFAULT '' COMMENT '信息键',
  `svalue` text NOT NULL COMMENT '信息值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='网站基本信息表';

-- ----------------------------
-- Records of setting
-- ----------------------------

-- ----------------------------
-- Table structure for special
-- ----------------------------
DROP TABLE IF EXISTS `special`;
CREATE TABLE `special` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '活动页面编号',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '广告单页',
  `content` text NOT NULL COMMENT '活动内容',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '活动状态：0 为结束 1为正在进行',
  `stime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='特殊活动单页\r\n比如情人节、中秋节';

-- ----------------------------
-- Records of special
-- ----------------------------

-- ----------------------------
-- Table structure for special_gallery
-- ----------------------------
DROP TABLE IF EXISTS `special_gallery`;
CREATE TABLE `special_gallery` (
  `id` int(10) NOT NULL,
  `specialid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '活动页面编号',
  `goodsimg` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='活动页面图片库';

-- ----------------------------
-- Records of special_gallery
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '注册用户名',
  `memname` varchar(20) NOT NULL DEFAULT '唯品会会员' COMMENT '会员名',
  `pw` char(128) NOT NULL COMMENT '用户密码',
  `phone` varchar(14) NOT NULL DEFAULT '',
  `everify` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '邮箱验证：0为未验证 1为已验证',
  `pverify` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '电话验证状态 ：''0'' 为未验证  ''1''为已验证 默认值为''0''',
  `email` varchar(32) NOT NULL DEFAULT '' COMMENT '电子邮箱',
  `atime` int(10) unsigned DEFAULT '0' COMMENT '注册时间',
  `ltime` int(10) unsigned DEFAULT '0' COMMENT '上次登录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户登录信息';

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for user_address
-- ----------------------------
DROP TABLE IF EXISTS `user_address`;
CREATE TABLE `user_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `goodaddress` varchar(128) NOT NULL DEFAULT '' COMMENT '收货地址',
  `IsDefault` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '默认值：0为不是默认地址 1为默认收货地址',
  `addresstype` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '地址类型：0为家庭地址  1为工作地址 2 为其他',
  `uphone` varchar(14) NOT NULL DEFAULT '' COMMENT '收货电话',
  `stanphone` varchar(14) NOT NULL DEFAULT '' COMMENT '备用电话',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户收货信息';

-- ----------------------------
-- Records of user_address
-- ----------------------------

-- ----------------------------
-- Table structure for user_basicinfo
-- ----------------------------
DROP TABLE IF EXISTS `user_basicinfo`;
CREATE TABLE `user_basicinfo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户基本信息id',
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `birthday` char(20) DEFAULT '' COMMENT '生日',
  `tel` varchar(11) DEFAULT '' COMMENT '固定电话',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '性别: 0为保密  1 为女 2 为男',
  `address` varchar(128) DEFAULT '' COMMENT '用户地址',
  `addresstype` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '地址类型：1 为工作地址 2 为家庭地址 ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户基本信息';

-- ----------------------------
-- Records of user_basicinfo
-- ----------------------------

-- ----------------------------
-- Table structure for user_detail
-- ----------------------------
DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE `user_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户详情信息id',
  `uid` int(10) unsigned DEFAULT '0' COMMENT '用户编号',
  `marrystate` tinyint(1) unsigned DEFAULT '0' COMMENT '婚姻状态:0为未婚 1为已婚 2 为保密',
  `work` char(8) DEFAULT '' COMMENT '职业',
  `education` char(8) DEFAULT '' COMMENT '学历',
  `buystandard` char(8) DEFAULT '' COMMENT '购物标准',
  `conweight` char(8) DEFAULT '' COMMENT '消费比重',
  `yearincome` char(8) DEFAULT '' COMMENT '年收入',
  `buytype` char(8) DEFAULT '' COMMENT '购物习惯',
  `promoteway` char(8) DEFAULT '' COMMENT '喜欢的促销方式',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户详细信息';

-- ----------------------------
-- Records of user_detail
-- ----------------------------
