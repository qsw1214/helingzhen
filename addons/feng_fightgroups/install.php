<?php
pdo_query("
DROP TABLE IF EXISTS `ims_tg_address`;
CREATE TABLE `ims_tg_address` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `mid` int(11) DEFAULT NULL COMMENT '粉丝ID',
  `openid` varchar(300) NOT NULL COMMENT '唯一标识',
  `cname` varchar(30) NOT NULL COMMENT '收货人名称',
  `tel` varchar(20) NOT NULL COMMENT '手机号',
  `province` varchar(20) NOT NULL COMMENT '省',
  `city` varchar(20) NOT NULL COMMENT '市',
  `county` varchar(20) NOT NULL COMMENT '县(区)',
  `detailed_address` varchar(225) NOT NULL COMMENT '详细地址',
  `uniacid` int(10) NOT NULL COMMENT '公众号id',
  `addtime` varchar(45) NOT NULL COMMENT '最后修改时间',
  `status` int(2) NOT NULL COMMENT '1为默认',
  `type` int(2) NOT NULL COMMENT '1公司，2家庭',
  `wlname` varchar(32) DEFAULT NULL,
  `wltel` varchar(32) DEFAULT NULL,
  `enterprise_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_admin`;
CREATE TABLE `ims_tg_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(30) NOT NULL COMMENT '管理员名称',
  `password` varchar(20) NOT NULL COMMENT '管理员密码',
  `email` varchar(60) NOT NULL COMMENT '邮箱',
  `tel` varchar(20) NOT NULL COMMENT '手机号',
  `uniacid` int(10) DEFAULT NULL COMMENT '公众号id',
  `openid` varchar(100) DEFAULT NULL COMMENT '用户openid',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `openid` (`openid`),
  UNIQUE KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `ims_tg_adv`;
CREATE TABLE `ims_tg_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `advname` varchar(50) DEFAULT '' COMMENT '幻灯片名称',
  `link` varchar(255) DEFAULT '' COMMENT '幻灯片链接',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '幻灯片图片',
  `displayorder` int(11) DEFAULT '0' COMMENT '排序',
  `enabled` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1显示',
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`uniacid`),
  KEY `indx_enabled` (`enabled`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_arealimit`;
CREATE TABLE `ims_tg_arealimit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `enabled` int(11) NOT NULL,
  `arealimitname` varchar(56) NOT NULL,
  `areas` text NOT NULL,
  `merchantid` int(11) NOT NULL COMMENT '所属商家',
  PRIMARY KEY (`id`)

DROP TABLE IF EXISTS `ims_tg_banner`;
CREATE TABLE `ims_tg_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一标识',
  `uniacid` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `displayorder` int(11) NOT NULL,
  `enabled` int(11) NOT NULL,
  `visible_level` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_category`;
CREATE TABLE `ims_tg_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `thumb` varchar(255) NOT NULL COMMENT '分类图片',
  `parentid` int(10) unsigned DEFAULT '0' COMMENT '上级分类ID,0为第一级',
  `isrecommand` int(10) DEFAULT '0',
  `description` varchar(500) DEFAULT NULL COMMENT '分类介绍',
  `displayorder` tinyint(3) unsigned DEFAULT '0' COMMENT '排序',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否开启',
  `visible_level` int(11) NOT NULL,
  `open` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_collect`;
CREATE TABLE `ims_tg_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `openid` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_comment`;
CREATE TABLE `ims_tg_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsid` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `openid` varchar(300) NOT NULL,
  `title` varchar(200) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `createtime` varchar(145) NOT NULL COMMENT '晒单时间',
  `status` int(11) NOT NULL COMMENT '1待审核2通过3未通过',
  `goodstitle` varchar(145) NOT NULL,
  `thumbs` varchar(2048) NOT NULL COMMENT '图集',
  `type` int(11) NOT NULL COMMENT '0:表示晒单；1：表示言论',
  `speechcount` int(11) NOT NULL COMMENT '评论条数',
  `count` int(11) NOT NULL COMMENT '被赞次数',
  `praise` text NOT NULL COMMENT '赞的人',
  `sid` int(11) DEFAULT NULL COMMENT '商家ID',
  `mid` int(11) DEFAULT NULL COMMENT '会员ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `ims_tg_coupon`;
CREATE TABLE `ims_tg_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coupon_template_id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `cash` varchar(20) NOT NULL,
  `is_at_least` tinyint(3) unsigned NOT NULL,
  `at_least` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_time` int(10) unsigned NOT NULL,
  `end_time` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `use_time` int(10) unsigned NOT NULL,
  `openid` varchar(100) NOT NULL,
  `uniacid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_coupon_template`;
CREATE TABLE `ims_tg_coupon_template` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '优惠券名称',
  `value` varchar(50) NOT NULL COMMENT '最小面值',
  `value_to` varchar(50) NOT NULL COMMENT '最大面值',
  `is_random` tinyint(3) unsigned NOT NULL COMMENT '是否随机',
  `is_at_least` tinyint(3) unsigned NOT NULL COMMENT '是否存在最低消费',
  `at_least` varchar(20) NOT NULL COMMENT '最低消费',
  `is_sync_weixin` tinyint(11) unsigned NOT NULL,
  `user_level` tinyint(11) unsigned DEFAULT NULL,
  `quota` tinyint(10) unsigned NOT NULL COMMENT '领取限制',
  `start_time` int(10) unsigned NOT NULL COMMENT '开始时间',
  `end_time` int(10) unsigned NOT NULL COMMENT '结束时间',
  `fans_tag` int(10) unsigned NOT NULL,
  `expire_notice` tinyint(4) unsigned NOT NULL,
  `is_share` tinyint(3) unsigned NOT NULL,
  `range_type` tinyint(3) unsigned NOT NULL,
  `is_forbid_preference` tinyint(3) unsigned NOT NULL,
  `description` varchar(255) NOT NULL COMMENT '描述',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `enable` tinyint(3) unsigned NOT NULL COMMENT '优惠券状态，1正常',
  `total` int(10) unsigned NOT NULL COMMENT '优惠券总量',
  `quantity_issue` int(10) unsigned NOT NULL,
  `quantity_used` int(10) unsigned NOT NULL COMMENT '已使用数量',
  `uid` int(10) unsigned NOT NULL,
  `uniacid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_credit_record`;
CREATE TABLE `ims_tg_credit_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `openid` varchar(245) NOT NULL,
  `num` varchar(30) NOT NULL,
  `createtime` varchar(145) NOT NULL,
  `transid` varchar(145) NOT NULL,
  `status` int(11) NOT NULL,
  `paytype` int(2) NOT NULL COMMENT '1微信2后台',
  `ordersn` varchar(145) NOT NULL,
  `type` int(2) NOT NULL COMMENT '1积分2余额',
  `remark` varchar(145) NOT NULL,
  `table` tinyint(4) DEFAULT NULL COMMENT '1微擎2tg',
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_credit1rechargerecord`;
CREATE TABLE `ims_tg_credit1rechargerecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `openid` varchar(245) NOT NULL,
  `num` varchar(100) NOT NULL,
  `createtime` varchar(145) NOT NULL,
  `transid` varchar(145) NOT NULL,
  `status` int(11) NOT NULL,
  `paytype` int(2) NOT NULL,
  `orderno` varchar(145) NOT NULL,
  `type` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_delivery_price`;
CREATE TABLE `ims_tg_delivery_price` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `template_id` int(10) unsigned NOT NULL,
  `province` varchar(12) NOT NULL,
  `city` varchar(12) NOT NULL,
  `district` varchar(12) NOT NULL,
  `first_weight` varchar(20) NOT NULL,
  `first_fee` varchar(20) NOT NULL,
  `additional_weight` varchar(20) NOT NULL,
  `additional_fee` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tid` (`template_id`),
  KEY `district` (`province`,`city`,`district`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_delivery_template`;
CREATE TABLE `ims_tg_delivery_template` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `merchantid` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `region` longtext NOT NULL,
  `data` longtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_discuss`;
CREATE TABLE `ims_tg_discuss` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自动排序',
  `openid` varchar(445) NOT NULL COMMENT '评论者openid',
  `content` varchar(225) NOT NULL COMMENT '评论类容',
  `parentid` int(11) NOT NULL COMMENT '晒单或者讨论id',
  `status` int(11) NOT NULL COMMENT '状态',
  `createtime` varchar(32) NOT NULL COMMENT '创建时间',
  `uniacid` int(11) NOT NULL COMMENT '公众号id',
  `commentid` int(11) DEFAULT NULL,
  `goodsid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论表';

DROP TABLE IF EXISTS `ims_tg_dispatch`;
CREATE TABLE `ims_tg_dispatch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `dispatchname` varchar(50) NOT NULL DEFAULT '' COMMENT '配送名称',
  `dispatchtype` int(11) NOT NULL DEFAULT '0' COMMENT '配送方式0快递1自提',
  `displayorder` int(11) DEFAULT '0' COMMENT '排序',
  `firstprice` decimal(10,2) DEFAULT '0.00' COMMENT '默认运费',
  `areas` text COMMENT '快递地区',
  `carriers` text COMMENT '自提地区',
  `enabled` int(11) NOT NULL DEFAULT '0' COMMENT '1启用',
  `merchantid` int(11) DEFAULT NULL COMMENT '商家ID',
  `secondprice` decimal(10,2) DEFAULT '0.00',
  `firstweight` int(11) DEFAULT '0',
  `secondweight` int(11) DEFAULT '0',
  `express` varchar(250) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_gift`;
CREATE TABLE `ims_tg_gift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL COMMENT '活动名称',
  `uniacid` int(11) NOT NULL,
  `goodsid` int(11) NOT NULL COMMENT '商品id',
  `starttime` varchar(145) DEFAULT NULL COMMENT '活动开启时间',
  `endtime` varchar(145) DEFAULT NULL COMMENT '活动结束时间',
  `gettime` int(11) DEFAULT NULL COMMENT '有效领取时间',
  `times` int(11) DEFAULT NULL COMMENT '领取次数',
  `sendnum` int(11) DEFAULT NULL COMMENT '赠送数量',
  `getnum` int(11) DEFAULT NULL COMMENT '领取数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_goods`;
CREATE TABLE `ims_tg_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uniacid` int(10) NOT NULL COMMENT '公众号的id',
  `gname` varchar(225) NOT NULL COMMENT '商品名称',
  `fk_typeid` int(10) unsigned DEFAULT NULL COMMENT '一级分类id',
  `gnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品库存',
  `groupnum` int(10) unsigned NOT NULL COMMENT '最低拼团人数',
  `mprice` decimal(10,2) NOT NULL COMMENT '市场价',
  `gprice` decimal(10,2) NOT NULL COMMENT '团购价',
  `oprice` decimal(10,2) NOT NULL COMMENT '单买价',
  `gdesc` text NOT NULL COMMENT '商品简介',
  `gdetaile` longtext NOT NULL COMMENT '商品图文详情',
  `gimg` varchar(225) NOT NULL COMMENT '首页图片',
  `isshow` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1上架2下架3售罄4回收站',
  `isnew` int(2) DEFAULT NULL COMMENT '1最新上架',
  `ishot` int(2) DEFAULT NULL COMMENT '1火爆',
  `isrecommand` int(2) DEFAULT NULL COMMENT '1推荐',
  `isdiscount` int(2) DEFAULT NULL COMMENT '1优惠',
  `salenum` int(10) unsigned NOT NULL COMMENT '销量',
  `displayorder` int(11) DEFAULT NULL COMMENT '首页排序',
  `credits` int(11) DEFAULT NULL COMMENT '单次购买获得积分',
  `endtime` int(11) NOT NULL COMMENT '团购限时（小时数）',
  `hasoption` int(11) NOT NULL COMMENT '1启用商品规格',
  `yunfei_id` int(11) NOT NULL COMMENT '运费模板ID',
  `is_hexiao` int(2) NOT NULL COMMENT '1支持核销',
  `hexiao_id` text,
  `is_share` int(2) DEFAULT NULL COMMENT '1开启分享',
  `is_discount` int(2) DEFAULT NULL COMMENT '1开启2关闭',
  `merchantid` int(11) NOT NULL COMMENT '商家ID',
  `share_title` varchar(200) NOT NULL COMMENT '分享标题',
  `share_image` varchar(250) NOT NULL COMMENT '分享图片',
  `share_desc` varchar(200) NOT NULL COMMENT '分享简介',
  `group_level` varchar(1000) NOT NULL COMMENT '阶梯团集',
  `group_level_status` int(11) NOT NULL COMMENT '2开启1关闭',
  `one_limit` int(11) DEFAULT NULL COMMENT '单次购买数',
  `many_limit` int(11) DEFAULT NULL COMMENT '单人购买数',
  `firstdiscount` decimal(10,2) DEFAULT NULL COMMENT '团长优惠金额',
  `category_childid` int(11) DEFAULT NULL COMMENT '二级分类子类ID',
  `category_parentid` int(11) DEFAULT NULL COMMENT '二级分类父类ID',
  `createtime` int(10) unsigned NOT NULL COMMENT '最后修改时间',
  `pv` int(11) DEFAULT NULL COMMENT '浏览次数',
  `uv` int(11) DEFAULT NULL COMMENT '浏览人数',
  `unit` varchar(32) DEFAULT NULL COMMENT '单位',
  `goodstab` varchar(32) DEFAULT NULL COMMENT '商品标签',
  `op_one_limit` int(11) DEFAULT NULL COMMENT '单次购买数',
  `first_free` int(11) NOT NULL,
  `give_coupon_id` int(11) NOT NULL,
  `give_gift_id` int(11) NOT NULL,
  `paysuccess` text NOT NULL COMMENT '支付成功详情',
  `atlas` text NOT NULL COMMENT '图集',
  `g_type` int(2) NOT NULL DEFAULT '1' COMMENT '商品类型',
  `allsalenum` int(11) DEFAULT NULL,
  `falsenum` int(11) DEFAULT NULL,
  `repeatjoin` int(11) NOT NULL,
  `visible_level` varchar(100) DEFAULT NULL,
  `goodscode` varchar(100) DEFAULT NULL,
  `category_parentid_top` int(11) NOT NULL,
  `redbag` text,
  `balance` int(11) DEFAULT NULL,
  `hexiaolimittime` varchar(145) DEFAULT NULL,
  `gsn` varchar(50) NOT NULL COMMENT '商品货号',
  `freight` decimal(10,2) NOT NULL,
  `comment` int(11) DEFAULT NULL,
  `prize` int(11) DEFAULT '0',
  `share_group` int(11) DEFAULT '0',
  `hexiaolimittimetype` int(11) DEFAULT '0',
  `share_image_group` varchar(445) DEFAULT NULL,
  `share_title_group` varchar(445) DEFAULT NULL,
  `share_desc_group` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_goods_atlas`;
CREATE TABLE `ims_tg_goods_atlas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `g_id` int(11) NOT NULL COMMENT '商品id',
  `thumb` varchar(145) NOT NULL COMMENT '图片路径',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_goods_imgs`;
CREATE TABLE `ims_tg_goods_imgs` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `fk_gid` int(10) NOT NULL COMMENT '对应商品的id',
  `albumpath` varchar(225) NOT NULL COMMENT '图片路径',
  `uniacid` int(10) NOT NULL COMMENT '公众号id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_gid` (`fk_gid`),
  UNIQUE KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `ims_tg_goods_option`;
CREATE TABLE `ims_tg_goods_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsid` int(10) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '规格详情',
  `thumb` varchar(60) DEFAULT '' COMMENT '规格图片',
  `productprice` decimal(10,2) DEFAULT '0.00' COMMENT '单独购买价',
  `marketprice` decimal(10,2) DEFAULT '0.00' COMMENT '团购价',
  `costprice` decimal(10,2) DEFAULT '0.00' COMMENT '市场价',
  `displayorder` int(11) DEFAULT '0',
  `specs` varchar(445) DEFAULT NULL,
  `stock` varchar(445) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `indx_goodsid` (`goodsid`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_goods_param`;
CREATE TABLE `ims_tg_goods_param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `goodsid` int(10) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '属性名称',
  `value` text NOT NULL COMMENT '属性值',
  `displayorder` int(11) DEFAULT '0' COMMENT '排序',
  `tagcontent` text,
  PRIMARY KEY (`id`),
  KEY `indx_goodsid` (`goodsid`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_goods_type`;
CREATE TABLE `ims_tg_goods_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cname` varchar(30) NOT NULL COMMENT '分类名称',
  `pid` int(10) DEFAULT NULL COMMENT '上级分类的id',
  `uniacid` int(10) DEFAULT NULL COMMENT '公众号的id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `ims_tg_group`;
CREATE TABLE `ims_tg_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `groupnumber` varchar(115) NOT NULL COMMENT '团编号',
  `goodsid` int(11) NOT NULL COMMENT '商品ID',
  `goodsname` varchar(1024) NOT NULL COMMENT '商品名称',
  `groupstatus` int(11) NOT NULL COMMENT '团状态',
  `neednum` int(11) NOT NULL COMMENT '所需人数',
  `lacknum` int(11) NOT NULL COMMENT '缺少人数',
  `starttime` varchar(225) NOT NULL COMMENT '开团时间',
  `endtime` varchar(225) NOT NULL COMMENT '到期时间',
  `grouptype` int(11) NOT NULL COMMENT '1同2异3普通4单',
  `isshare` int(11) NOT NULL COMMENT '1分享2不分享',
  `merchantid` int(11) NOT NULL COMMENT '商家ID',
  `price` varchar(11) DEFAULT NULL,
  `successtime` varchar(45) DEFAULT NULL COMMENT '团成功时间',
  `lottery_id` int(11) NOT NULL,
  `iflottery` int(11) NOT NULL,
  `lottery_status` int(11) NOT NULL,
  `endnum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_helpbuy`;
CREATE TABLE `ims_tg_helpbuy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` varchar(45) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_lottery`;
CREATE TABLE `ims_tg_lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(145) DEFAULT NULL,
  `goodsid` int(11) DEFAULT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1进行2未开始3已结束4暂停',
  `prize` varchar(445) DEFAULT NULL,
  `createtime` varchar(145) DEFAULT NULL,
  `fk_goodsid` int(11) DEFAULT NULL COMMENT '商品ID',
  `num` int(11) DEFAULT NULL COMMENT '奖品数量',
  `displayorder` int(11) DEFAULT NULL COMMENT '排序',
  `lprice` decimal(10,2) DEFAULT NULL COMMENT '抽奖价',
  `gprice` decimal(10,2) DEFAULT NULL COMMENT '团购价',
  `groupnum` int(11) DEFAULT NULL COMMENT '团人数',
  `starttime` varchar(145) DEFAULT NULL COMMENT '开始时间',
  `endtime` varchar(145) DEFAULT NULL COMMENT '结束时间',
  `dostatus` int(11) DEFAULT '0' COMMENT '1已抽奖',
  `one_limit` int(11) DEFAULT NULL COMMENT '1单人可购买多次2不可',
  `gdetaile` text COMMENT '图文详情',
  `gimg` varchar(145) DEFAULT NULL,
  `num2` int(11) DEFAULT NULL COMMENT '二等奖品数',
  `num3` int(11) DEFAULT NULL COMMENT '三等数量',
  `imgs` varchar(225) DEFAULT NULL COMMENT '图集',
  `gdesc` text COMMENT '规则简介',
  `nogetmessage` int(11) NOT NULL,
  `name` varchar(145) DEFAULT NULL,
  `first_num` int(11) DEFAULT NULL,
  `second_num` int(11) DEFAULT NULL,
  `third_num` int(11) DEFAULT NULL,
  `forth_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `ims_tg_marketing`;
CREATE TABLE `ims_tg_marketing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `fk_goodsid` int(11) DEFAULT NULL COMMENT '外键goodsid',
  `type` int(11) DEFAULT NULL COMMENT '1满减2包邮3抵扣',
  `value` text COMMENT '设置的值',
  PRIMARY KEY (`id`),
  KEY `goodsidd` (`fk_goodsid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品的营销';

DROP TABLE IF EXISTS `ims_tg_member`;
CREATE TABLE `ims_tg_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '会员id',
  `uniacid` int(10) unsigned NOT NULL COMMENT '公众账号id',
  `openid` varchar(100) NOT NULL COMMENT '微信会员openID',
  `mobile` varchar(45) DEFAULT NULL COMMENT '手机号',
  `realname` varchar(132) DEFAULT NULL COMMENT '真实姓名',
  `nickname` varchar(50) NOT NULL COMMENT '昵称',
  `avatar` varchar(255) NOT NULL COMMENT '头像',
  `address` varchar(132) DEFAULT NULL COMMENT '常用地址',
  `tag` varchar(1000) DEFAULT NULL COMMENT '其他属性集',
  `credit1` decimal(10,2) DEFAULT '0.00' COMMENT '积分',
  `credit2` decimal(10,2) DEFAULT '0.00' COMMENT '余额',
  `appopenid` varchar(100) DEFAULT NULL,
  `unionid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_merchant`;
CREATE TABLE `ims_tg_merchant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `openid` varchar(145) NOT NULL,
  `name` varchar(145) NOT NULL COMMENT '商家名称',
  `logo` varchar(225) NOT NULL COMMENT '商家logo',
  `industry` varchar(45) DEFAULT NULL COMMENT '行业',
  `address` varchar(115) DEFAULT NULL COMMENT '商家地址',
  `linkman_name` varchar(145) DEFAULT NULL COMMENT '联系人姓名',
  `linkman_mobile` varchar(145) DEFAULT NULL COMMENT '联系电话',
  `thumb` varchar(255) DEFAULT NULL COMMENT '介绍图片',
  `detail` varchar(1222) DEFAULT NULL COMMENT '简介',
  `salenum` int(11) DEFAULT NULL COMMENT '商家销量',
  `open` int(11) DEFAULT NULL COMMENT '2不分配后台权限',
  `uname` varchar(45) DEFAULT NULL COMMENT '商家帐号',
  `password` varchar(145) DEFAULT NULL COMMENT '商家密码',
  `uid` int(11) DEFAULT NULL COMMENT '商家用户ID',
  `messageopenid` varchar(145) DEFAULT NULL COMMENT '被通知者openid',
  `goodsnum` int(11) DEFAULT NULL COMMENT '商家上传商品数量上限',
  `percent` varchar(111) DEFAULT NULL COMMENT '商家上缴佣金百分比',
  `createtime` varchar(115) NOT NULL COMMENT '添加时间',
  `allsalenum` int(11) DEFAULT NULL,
  `falsenum` int(11) DEFAULT NULL,
  `tag` text,
  `lng` varchar(145) DEFAULT NULL,
  `lat` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_merchant_account`;
CREATE TABLE `ims_tg_merchant_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `merchantid` int(11) NOT NULL COMMENT '商家ID',
  `uid` int(11) NOT NULL COMMENT '操作员id',
  `amount` decimal(10,2) NOT NULL COMMENT '交易总金额',
  `updatetime` varchar(45) NOT NULL COMMENT '上次结算时间',
  `no_money` decimal(10,2) NOT NULL COMMENT '目前未结算金额',
  `no_money_doing` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_merchant_money_record`;
CREATE TABLE `ims_tg_merchant_money_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `merchantid` int(11) DEFAULT NULL COMMENT '商家ID',
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '变动金额',
  `createtime` varchar(145) DEFAULT NULL COMMENT '变动时间',
  `orderid` int(11) DEFAULT NULL COMMENT '订单ID',
  `type` int(11) DEFAULT NULL COMMENT '1支付成功2发货成功成为可结算金额3取消发货4商家结算5退款',
  `detail` text COMMENT '详情',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='商家金额记录';

DROP TABLE IF EXISTS `ims_tg_merchant_record`;
CREATE TABLE `ims_tg_merchant_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `merchantid` int(11) NOT NULL COMMENT '商家id',
  `money` varchar(45) NOT NULL COMMENT '本次结算金额',
  `uid` int(11) NOT NULL COMMENT '操作员id',
  `createtime` varchar(45) NOT NULL COMMENT '结算时间',
  `orderno` varchar(45) NOT NULL,
  `commission` varchar(45) NOT NULL,
  `percent` varchar(45) NOT NULL,
  `get_money` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `updatetime` varchar(145) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_nav`;
CREATE TABLE `ims_tg_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一标识',
  `uniacid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `displayorder` int(11) NOT NULL,
  `enabled` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_notice`;
CREATE TABLE `ims_tg_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一标识',
  `uniacid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `enabled` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_oplog`;
CREATE TABLE `ims_tg_oplog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `describe` varchar(225) DEFAULT NULL COMMENT '操作描述',
  `view_url` varchar(225) DEFAULT NULL COMMENT '操作界面url',
  `ip` varchar(32) DEFAULT NULL COMMENT 'IP',
  `data` varchar(1024) DEFAULT NULL COMMENT '操作数据',
  `createtime` varchar(32) DEFAULT NULL COMMENT '操作时间',
  `user` varchar(32) DEFAULT NULL COMMENT '操作员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_order`;
CREATE TABLE `ims_tg_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` varchar(45) NOT NULL,
  `openid` varchar(145) NOT NULL,
  `helpbuy_opneid` varchar(145) DEFAULT NULL COMMENT '代付人openid',
  `gnum` int(11) NOT NULL COMMENT '购买数量',
  `ptime` varchar(20) DEFAULT NULL COMMENT '支付成功时间',
  `sendtime` varchar(20) DEFAULT NULL COMMENT '发货时间',
  `gettime` varchar(20) DEFAULT NULL COMMENT '收货时间',
  `orderno` varchar(50) NOT NULL COMMENT '订单编号',
  `price` varchar(45) NOT NULL COMMENT '实际支付金额',
  `goodsprice` varchar(45) NOT NULL COMMENT '商品价格',
  `freight` decimal(10,2) DEFAULT NULL COMMENT '运费',
  `status` int(2) NOT NULL COMMENT '0未支付,1支付，2待发货，3已发货，4已签收，5已取消，6待退款，7已退款，8部分退款',
  `addressid` int(11) NOT NULL COMMENT '地址id',
  `addresstype` int(11) NOT NULL COMMENT '地址类型，1公司2家庭',
  `g_id` int(11) NOT NULL COMMENT '商品id',
  `tuan_id` int(11) NOT NULL COMMENT '团id',
  `credits` int(11) DEFAULT NULL COMMENT '积分',
  `is_usecard` int(11) DEFAULT NULL COMMENT '1优惠过（优惠券，团长优惠）',
  `is_tuan` int(2) NOT NULL COMMENT '是否为团1为团0为单人2多余人退款',
  `pay_price` varchar(45) NOT NULL COMMENT '运费加商品费',
  `pay_type` int(4) DEFAULT NULL COMMENT '支付方式',
  `starttime` varchar(45) NOT NULL COMMENT '开始时间',
  `endtime` int(45) NOT NULL COMMENT '结束时间（小时）',
  `tuan_first` int(11) DEFAULT NULL COMMENT '1团长',
  `express` varchar(50) DEFAULT NULL COMMENT '快递公司名称',
  `expresssn` varchar(50) DEFAULT NULL COMMENT '快递单号',
  `transid` varchar(50) DEFAULT NULL COMMENT '微信订单号',
  `remark` varchar(200) DEFAULT NULL COMMENT '备注',
  `optionid` int(11) DEFAULT NULL COMMENT '规格ID',
  `addname` varchar(50) NOT NULL COMMENT '收货人姓名',
  `mobile` varchar(50) NOT NULL COMMENT '收货人电话',
  `address` varchar(300) NOT NULL COMMENT '收货人地址',
  `checkpay` int(2) DEFAULT NULL COMMENT '1该订单号已被支付（代付）',
  `is_hexiao` int(2) DEFAULT NULL COMMENT '1核销0不是核销',
  `hexiaoma` varchar(45) DEFAULT NULL COMMENT '核销码',
  `veropenid` varchar(200) DEFAULT NULL COMMENT '核销人openid',
  `merchantid` int(11) DEFAULT NULL COMMENT '商家id',
  `optionname` varchar(50) DEFAULT NULL COMMENT '规格名称',
  `issettlement` int(3) DEFAULT NULL COMMENT '0未结算订单1已结算',
  `message` varchar(200) DEFAULT NULL COMMENT '代付留言',
  `ordertype` int(3) DEFAULT NULL COMMENT '1为代付订单',
  `othername` varchar(45) DEFAULT NULL COMMENT '代付人姓名',
  `createtime` varchar(45) NOT NULL COMMENT '订单生成时间',
  `successtime` varchar(45) DEFAULT NULL COMMENT '团成功时间',
  `adminremark` text COMMENT '卖家备注',
  `discount_fee` varchar(32) DEFAULT NULL COMMENT '优惠券优惠的钱',
  `first_fee` varchar(32) DEFAULT NULL COMMENT '团长优惠的钱',
  `couponid` int(11) DEFAULT NULL COMMENT '优惠券id',
  `bdeltime` int(11) DEFAULT NULL COMMENT '预约核销时间',
  `giftid` int(11) NOT NULL,
  `getcouponid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `first_free` int(11) NOT NULL,
  `lottery_status` int(11) NOT NULL,
  `lotteryid` int(11) NOT NULL,
  `marketing` text NOT NULL COMMENT '图集',
  `success` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_order_goods`;
CREATE TABLE `ims_tg_order_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `fk_orderid` int(10) NOT NULL COMMENT '订单id',
  `fk_goodid` int(10) NOT NULL COMMENT '商品id',
  `uniacid` int(10) NOT NULL COMMENT '公众号id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_orderid` (`fk_orderid`),
  UNIQUE KEY `fk_goodid` (`fk_goodid`),
  UNIQUE KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `ims_tg_order_print`;
CREATE TABLE `ims_tg_order_print` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `pid` int(3) NOT NULL,
  `oid` int(10) NOT NULL,
  `foid` varchar(50) NOT NULL,
  `status` int(3) NOT NULL,
  `addtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_page`;
CREATE TABLE `ims_tg_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `params` longtext NOT NULL,
  `html` longtext NOT NULL,
  `click_pv` varchar(10) NOT NULL,
  `click_uv` varchar(10) NOT NULL,
  `enter_pv` varchar(10) NOT NULL,
  `enter_uv` varchar(10) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_print`;
CREATE TABLE `ims_tg_print` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `print_no` varchar(30) NOT NULL,
  `key` varchar(30) NOT NULL,
  `print_nums` int(3) NOT NULL,
  `qrcode_link` varchar(100) NOT NULL,
  `status` int(3) NOT NULL,
  `mode` int(11) NOT NULL,
  `member_code` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_puv`;
CREATE TABLE `ims_tg_puv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` varchar(45) NOT NULL,
  `pv` varchar(20) DEFAULT NULL COMMENT '总浏览人次',
  `uv` varchar(50) NOT NULL COMMENT '总浏览人数',
  `merchantid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_puv_record`;
CREATE TABLE `ims_tg_puv_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` varchar(45) NOT NULL,
  `openid` varchar(145) NOT NULL,
  `goodsid` int(11) NOT NULL COMMENT '商品id',
  `createtime` varchar(120) DEFAULT NULL COMMENT '访问时间',
  `status` int(11) NOT NULL,
  `merchantid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_refund_record`;
CREATE TABLE `ims_tg_refund_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1手机端2Web端3最后一人退款4部分退款',
  `goodsid` int(11) NOT NULL COMMENT '商品ID',
  `payfee` varchar(100) NOT NULL COMMENT '支付金额',
  `refundfee` varchar(100) NOT NULL COMMENT '退还金额',
  `transid` varchar(115) NOT NULL COMMENT '订单编号',
  `refund_id` varchar(115) NOT NULL COMMENT '微信退款单号',
  `refundername` varchar(100) NOT NULL COMMENT '退款人姓名',
  `refundermobile` varchar(100) NOT NULL COMMENT '退款人电话',
  `goodsname` varchar(100) NOT NULL COMMENT '商品名称',
  `createtime` varchar(45) NOT NULL COMMENT '退款时间',
  `status` int(11) NOT NULL COMMENT '0未成功1成功',
  `orderid` varchar(45) NOT NULL COMMENT '订单id',
  `merchantid` int(11) NOT NULL COMMENT '商家id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_rules`;
CREATE TABLE `ims_tg_rules` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `rulesname` varchar(40) NOT NULL COMMENT '规则名称',
  `rulesdetail` varchar(4000) DEFAULT NULL COMMENT '规则详情',
  `uniacid` int(10) NOT NULL COMMENT '公众号的id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `rulesname` (`rulesname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `ims_tg_saler`;
CREATE TABLE `ims_tg_saler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `storeid` varchar(225) DEFAULT '' COMMENT '所属门店id集',
  `nickname` varchar(145) NOT NULL COMMENT '昵称',
  `avatar` varchar(225) NOT NULL COMMENT '头像',
  `status` tinyint(3) DEFAULT '0' COMMENT '1启用',
  `merchantid` int(11) NOT NULL COMMENT '商家ID',
  PRIMARY KEY (`id`),
  KEY `idx_storeid` (`storeid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_scratch`;
CREATE TABLE `ims_tg_scratch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL COMMENT '活动名称',
  `starttime` varchar(32) DEFAULT NULL COMMENT '开始时间',
  `endtime` varchar(32) DEFAULT NULL COMMENT '结束时间\n',
  `detail` varchar(145) DEFAULT NULL COMMENT '说明',
  `use_credits` varchar(32) DEFAULT NULL COMMENT '需花费积分',
  `get_credits` varchar(32) DEFAULT NULL COMMENT '得到积分',
  `join_times` int(11) DEFAULT NULL COMMENT '参与次数',
  `winning_rate` varchar(32) DEFAULT NULL COMMENT '中奖率',
  `prize` varchar(1024) DEFAULT NULL COMMENT '奖品',
  `uniacid` int(11) DEFAULT NULL,
  `only_others` int(11) DEFAULT NULL COMMENT '1为只送积分给未中奖人',
  `status` int(11) DEFAULT NULL COMMENT '1开启',
  `alert_logo` varchar(145) DEFAULT NULL COMMENT '弹出的抽奖提示图',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_scratch_record`;
CREATE TABLE `ims_tg_scratch_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `openid` varchar(145) NOT NULL COMMENT '参与人openid',
  `activity_id` int(11) NOT NULL COMMENT '活动id',
  `type` varchar(45) DEFAULT NULL COMMENT '活动类型',
  `status` int(11) DEFAULT NULL COMMENT '2待领取3已领取',
  `prize` varchar(445) DEFAULT NULL COMMENT '奖品详情',
  `createtime` varchar(145) DEFAULT NULL COMMENT '参与时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_setting`;
CREATE TABLE `ims_tg_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `key` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_spec`;
CREATE TABLE `ims_tg_spec` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `displaytype` tinyint(3) unsigned NOT NULL,
  `content` text NOT NULL,
  `goodsid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `merchantid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_spec_item`;
CREATE TABLE `ims_tg_spec_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `specid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `show` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`uniacid`),
  KEY `indx_specid` (`specid`),
  KEY `indx_show` (`show`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_store`;
CREATE TABLE `ims_tg_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `storename` varchar(255) DEFAULT '' COMMENT '店铺名称',
  `address` varchar(255) DEFAULT '' COMMENT '店铺地址',
  `tel` varchar(255) DEFAULT '' COMMENT '电话',
  `lat` varchar(255) DEFAULT '' COMMENT '纬度',
  `lng` varchar(255) DEFAULT '' COMMENT '经度',
  `status` tinyint(3) DEFAULT '0' COMMENT '1启用',
  `merchantid` int(11) NOT NULL COMMENT '商家ID',
  `createtime` varchar(45) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_user_menu`;
CREATE TABLE `ims_tg_user_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `level` tinyint(3) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `extend_title` varchar(50) NOT NULL,
  `extend_url` varchar(255) NOT NULL,
  `extend_icon` varchar(255) NOT NULL,
  `active_urls` text NOT NULL,
  `is_system` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_user_node`;
CREATE TABLE `ims_tg_user_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `url` varchar(300) NOT NULL,
  `do` varchar(255) NOT NULL,
  `ac` varchar(32) DEFAULT NULL,
  `op` varchar(32) DEFAULT NULL,
  `ac_id` int(11) DEFAULT NULL,
  `do_id` int(6) unsigned NOT NULL,
  `remark` varchar(255) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `level` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`do_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_user_role`;
CREATE TABLE `ims_tg_user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `nodes` text NOT NULL COMMENT '权限集',
  `merchantid` int(11) NOT NULL COMMENT '商家ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_tg_users`;
CREATE TABLE `ims_tg_users` (
  `id` int(10) NOT NULL COMMENT '主键',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` varchar(20) NOT NULL COMMENT '用户密码',
  `email` varchar(60) NOT NULL COMMENT '邮箱',
  `tel` varchar(20) NOT NULL COMMENT '电话',
  `uniacid` int(10) NOT NULL COMMENT '公众号id',
  `openid` varchar(100) NOT NULL COMMENT '用户openid',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `uniacid` (`uniacid`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `ims_tg_waittask`;
CREATE TABLE `ims_tg_waittask` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `value` varchar(145) DEFAULT NULL,
  `key` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

");