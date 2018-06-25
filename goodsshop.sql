# Host: localhost  (Version: 5.5.53)
# Date: 2017-12-28 11:34:48
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin_table"
#

DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE `admin_table` (
  `adm_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `adm_name` varchar(255) DEFAULT '',
  `adm_pwd` varchar(255) DEFAULT '',
  `add_time` int(11) unsigned DEFAULT '0',
  `adm_role_id` tinyint(3) unsigned DEFAULT '0' COMMENT '角色id',
  PRIMARY KEY (`adm_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理表';

#
# Data for table "admin_table"
#


#
# Structure for table "adminuser"
#

DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE `adminuser` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `adminusername` varchar(255) DEFAULT NULL,
  `adminpw` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "adminuser"
#

/*!40000 ALTER TABLE `adminuser` DISABLE KEYS */;
INSERT INTO `adminuser` VALUES (1,'shopphp','123456');
/*!40000 ALTER TABLE `adminuser` ENABLE KEYS */;

#
# Structure for table "authority"
#

DROP TABLE IF EXISTS `authority`;
CREATE TABLE `authority` (
  `auth_Id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(255) DEFAULT '' COMMENT '名称',
  `auth_pid` smallint(6) unsigned DEFAULT '0' COMMENT '父id',
  `auth_c` varchar(255) DEFAULT '' COMMENT '控制器',
  `auth_a` varchar(255) DEFAULT '' COMMENT '操作方法',
  `auth_path` varchar(255) DEFAULT '' COMMENT '全路径',
  `auth_level` tinyint(3) DEFAULT '0' COMMENT '级别',
  PRIMARY KEY (`auth_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限表';

#
# Data for table "authority"
#


#
# Structure for table "indexshowgoods"
#

DROP TABLE IF EXISTS `indexshowgoods`;
CREATE TABLE `indexshowgoods` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(255) DEFAULT NULL COMMENT '商品展示名字',
  `goodsprice` varchar(255) DEFAULT NULL COMMENT '商品价格',
  `goodsurl` varchar(255) DEFAULT NULL COMMENT '商品路径',
  `goodsweight` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='主页商品展示表';

#
# Data for table "indexshowgoods"
#

INSERT INTO `indexshowgoods` VALUES (11,'红米5A','599','/Back/Public/upload/5a2a4c8402319.png',258.00),(12,'小米笔记本','3599','/Back/Public/upload/5a2a4cdb29031.png',369.00),(13,'小米电视4A 43英寸 标准版','1999','/Back/Public/upload/5a2a4d491d4b1.png',245.00),(19,'小米粉红版','2599','/Back/Public/upload/5a328ed59929d.png',256.00);

#
# Structure for table "myindent"
#

DROP TABLE IF EXISTS `myindent`;
CREATE TABLE `myindent` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `I_goodsname` varchar(255) DEFAULT NULL,
  `I_indentnum` int(11) DEFAULT NULL,
  `I_price` decimal(10,2) DEFAULT NULL,
  `I_nowtime` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "myindent"
#

/*!40000 ALTER TABLE `myindent` DISABLE KEYS */;
/*!40000 ALTER TABLE `myindent` ENABLE KEYS */;

#
# Structure for table "shopcart"
#

DROP TABLE IF EXISTS `shopcart`;
CREATE TABLE `shopcart` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goodsurl` varchar(255) DEFAULT NULL COMMENT '图片路径',
  `goodsname` varchar(255) DEFAULT NULL COMMENT '商品名称',
  `goodsweight` varchar(19) DEFAULT NULL COMMENT '商品重量',
  `goodsprice` decimal(7,2) DEFAULT NULL COMMENT '商品价格',
  `goodsnumber` smallint(6) DEFAULT NULL COMMENT '商品数量',
  `goodstotal` decimal(10,2) DEFAULT NULL COMMENT '商品总价',
  `pid` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

#
# Data for table "shopcart"
#

INSERT INTO `shopcart` VALUES (56,'/Back/Public/upload/5a2b8103dc361.png','小米MIX2粉色','64G',3299.00,10,25790.00,1),(58,'/Back/Public/upload/5a328ed59929d.png','小米粉红版','64G',2599.00,16,41584.00,2);

#
# Structure for table "shopgoodsuser"
#

DROP TABLE IF EXISTS `shopgoodsuser`;
CREATE TABLE `shopgoodsuser` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `shopusername` varchar(255) DEFAULT NULL,
  `shopemail` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `shoppassword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "shopgoodsuser"
#

/*!40000 ALTER TABLE `shopgoodsuser` DISABLE KEYS */;
INSERT INTO `shopgoodsuser` VALUES (1,'胡经邦','2292756556@qq.com','1781760045','759153wsad'),(2,'说话又好听','2429709152@qq.com','17817640045','759153wsad');
/*!40000 ALTER TABLE `shopgoodsuser` ENABLE KEYS */;
