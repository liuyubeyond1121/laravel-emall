 DROP DATABASE  IF EXISTS mall ;
 CREATE DATABASE IF NOT EXISTS mall CHARACTER SET=utf8;
 USE mall ;
 # 所有表的前缀使用


 # 性别表
 DROP TABLE IF EXISTS sex ;
 CREATE TABLE IF NOT EXISTS sex(
   id            TINYINT(1)        PRIMARY KEY      AUTO_INCREMENT ,
   sex           VARCHAR(10)       NOT NULL
 ) ;
 INSERT INTO sex(sex)VALUES ('男'),('女'),('保密') ;

 # 状态表
 DROP TABLE IF EXISTS status ;
 CREATE TABLE IF NOT EXISTS status(
   id            TINYINT(1)      PRIMARY KEY  ,
   status        VARCHAR(20)  NOT NULL   UNIQUE
 ) ;
 INSERT INTO status(id, status) VALUES (1,'已启用') ;
 INSERT INTO status(id, status) VALUES (2,'待审核') ;
 INSERT INTO status(id, status) VALUES (3,'已审核') ;
 INSERT INTO status(id, status) VALUES (8,'已停用') ;
 INSERT INTO status(id, status) VALUES (9,'已删除') ;


 ######   后台数据    #####

 # 管理员角色表
 DROP TABLE IF EXISTS role ;
 CREATE TABLE IF NOT EXISTS role(
   id              INT             PRIMARY KEY        AUTO_INCREMENT ,
   name            VARCHAR(50)     NOT NULL ,
   description     VARCHAR(500)    NOT NULL
 ) ;
 INSERT INTO role(name, description) VALUES ('超级管理员','拥有至高无上的权利') ;
 INSERT INTO role(name, description) VALUES ('主编','具有添加、审核、发布、删除内容的权限') ;
 INSERT INTO role(name, description) VALUES ('栏目主辑','只对所在栏目具有添加、审核、发布、删除内容的权限') ;
 INSERT INTO role(name, description) VALUES ('栏目编辑','只对所在栏目具有添加、删除草稿等权利') ;

 # 管理员用户表
 DROP TABLE IF EXISTS manager ;
 CREATE TABLE IF NOT EXISTS manager(
   id            INT            PRIMARY KEY    AUTO_INCREMENT,
   username      VARCHAR(20)    NOT NULL       UNIQUE ,
   password      VARCHAR(32)    NOT NULL ,
   email         VARCHAR(50)    NOT NULL ,
   phone         VARCHAR(11)    NOT NULL ,
   remark        TEXT               NULL ,
   roleid        INT            NOT NULL ,
   status        TINYINT(1)     NOT NULL       DEFAULT 1,
   addtime       TIMESTAMP      DEFAULT        current_timestamp ,
   FOREIGN KEY (roleid) REFERENCES role(id) ,
   FOREIGN KEY (status) REFERENCES status(id)
 ) ;

INSERT INTO manager(username, password, email, phone, remark, roleid) VALUES ('lky','e10adc3949ba59abbe56e057f20f883e','liuyu@live.cn','13288888888','十里平湖霜满天',1) ;
INSERT INTO manager(username, password, email, phone, remark, roleid) VALUES ('tom','e10adc3949ba59abbe56e057f20f883e','tom@gmail.com','13838385438','寸寸青丝愁华年',2) ;
INSERT INTO manager(username, password, email, phone, remark, roleid) VALUES ('lky1','e10adc3949ba59abbe56e057f20f883e','tom@gmail.com','13838385438','寸寸青丝愁华年',3) ;
INSERT INTO manager(username, password, email, phone, remark, roleid) VALUES ('tom1','e10adc3949ba59abbe56e057f20f883e','tom@gmail.com','13838385438','寸寸青丝愁华年',4) ;
INSERT INTO manager(username, password, email, phone, remark, roleid,status) VALUES ('tom2','e10adc3949ba59abbe56e057f20f883e','tom@gmail.com','13838385438','寸寸青丝愁华年',3,9) ;
INSERT INTO manager(username, password, email, phone, remark, roleid,status) VALUES ('tom3','e10adc3949ba59abbe56e057f20f883e','tom@gmail.com','13838385438','寸寸青丝愁华年',3,2) ;
INSERT INTO manager(username, password, email, phone, remark, roleid,status) VALUES ('tom4','e10adc3949ba59abbe56e057f20f883e','tom@gmail.com','13838385438','寸寸青丝愁华年',3,3) ;
INSERT INTO manager(username, password, email, phone, remark, roleid,status) VALUES ('tom5','e10adc3949ba59abbe56e057f20f883e','tom@gmail.com','13838385438','寸寸青丝愁华年',3,8) ;


############################################################################################



 # 用户表
 DROP TABLE IF EXISTS user ;
 CREATE TABLE IF NOT EXISTS user(
   id            INT               PRIMARY KEY    AUTO_INCREMENT,
   username      VARCHAR(20)       NOT NULL       UNIQUE ,
   password      CHAR(32)          NOT NULL ,
   nick          VARCHAR(50)       NOT NULL ,
   sex           TINYINT(1)        NOT NULL       DEFAULT       1,
   email         VARCHAR(50)       NOT NULL ,
   phone         VARCHAR(11)       NOT NULL ,
   addr          VARCHAR(100)      NULL           DEFAULT      '这家伙轻轻飘过，不带走一片云彩',
   remark        TEXT              NULL  ,                                               # 评论
   signature     VARCHAR(200)      NULL           DEFAULT      '这家伙很懒，什么也没有留下', # 签名
   status        TINYINT(1)        NOT NULL       DEFAULT       2,
   userexp       INT               NOT NULL       DEFAULT       0, # 用户积分
   level         TINYINT           NOT NULL       DEFAULT       1, # 用户等级
   addtime       TIMESTAMP         NOT NULL       DEFAULT current_timestamp,
   FOREIGN KEY (sex) REFERENCES sex(id),
   FOREIGN KEY (status) REFERENCES status(id)
 ) ;
 INSERT INTO user(username, password,nick,email, phone, remark) VALUES ('jack','e10adc3949ba59abbe56e057f20f883e','jack','liuyu@live.cn','13288888888','十里平湖霜满天') ;
 INSERT INTO user(username, password,nick,email, phone, remark,sex) VALUES ('jack1','e10adc3949ba59abbe56e057f20f883e','jack','liuyu@live.cn','13288888888','十里平湖霜满天',2) ;
 INSERT INTO user(username, password,nick,email, phone, remark,sex) VALUES ('jackaa','e10adc3949ba59abbe56e057f20f883e','jack','liuyu@live.cn','13288888888','十里平湖霜满天',2) ;
#  ALTER TABLE user ADD signature  VARCHAR(200) NULL DEFAULT '这家伙很懒，什么也没有留下';
#  ALTER TABLE user MODIFY addr  VARCHAR(100) NULL DEFAULT '这家伙轻轻飘过，不带走一片云彩';
 ALTER TABLE user ADD image VARCHAR(30) NULL DEFAULT 'avatar-default.jpg' ;
UPDATE user SET image='avatar-default.jpg' ;

#######################################################################################

# 产品类型表
 DROP TABLE IF EXISTS type ;
 CREATE TABLE IF NOT EXISTS type(
   id            INT             PRIMARY KEY       AUTO_INCREMENT,
   typename      VARCHAR(30)     NOT NULL,
   status        TINYINT(1)      NOT NULL          DEFAULT 1,
   pid           TINYINT         NOT NULL          DEFAULT 0
 );
INSERT INTO type(typename)VALUES ('家具建材'), ('美食吃喝')  , ('珠宝手表') , ('家电办公') , ('手机数码') ,
  ('鞋包配饰') , ('运动户外') , ('护肤彩妆') , ('居家家纺') , ('母婴玩具') , ('文化娱乐') , ('日用百货'),('服装内衣') ;

INSERT INTO type(typename, pid)VALUES('各类家具',1),('五金电工',1),('灯具照明',1),('厨卫卫浴',1) ;
INSERT INTO type(typename, pid)VALUES('特产干货',2),('名烟名酒',2),('新鲜蔬果',2),('特色小吃',2) ;
INSERT INTO type(typename, pid)VALUES('珠宝首饰',3),('流行饰品',3),('品牌手表',3),('眼镜',3) ;
INSERT INTO type(typename, pid)VALUES('生活电器',4),('厨房电器',4),('影音电器',4),('办公设备',4),('文化用品',4) ;
INSERT INTO type(typename, pid)VALUES('手机',5),('相机',5),('电脑',5),('数码配件',5) ;
INSERT INTO type(typename, pid)VALUES('男鞋',6),('女鞋',6),('男包',6),('女包',6),('女士配件',6),('男士配件',6) ;
INSERT INTO type(typename, pid)VALUES('健身用品',7),('运动品牌',7),('户外品牌',7) ;
INSERT INTO type(typename, pid)VALUES('护肤用品',8),('彩妆用品',8),('美容工具',8),('美发产品',8),('身体护理',8),('香水',8) ;
INSERT INTO type(typename, pid)VALUES('床品套件',9),('家纺用品',9),('家居饰品',9),('窗帘帘类',9) ;
INSERT INTO type(typename, pid)VALUES('孕产新妈',10),('婴幼食品',10),('婴幼用品',10),('早教玩具',10),('婴童服装',10),('童鞋配饰',10)  ;
INSERT INTO type(typename, pid)VALUES('休闲娱乐',11),('乐器',11),('古董收藏',11),('鲜花绿植',11),('音像影视',11),('书籍杂志',11),('宠物世界',11),('动漫周边',11) ;
INSERT INTO type(typename, pid)VALUES('餐具',12),('收纳',12),('清洁',12) ;
INSERT INTO type(typename, pid)VALUES('男装',13),('女装',13),('女士内衣',13),('男士内衣',13) ;
INSERT INTO type(typename, pid)VALUES('小米',31),('华为',31),('苹果',31),('三星',31) ;
INSERT INTO type(typename, pid)VALUES('小米MIX2',75),('小米MAX2',75),('红米Note 5A',75),('红米Note 4X',75) ;
INSERT INTO type(typename, pid)VALUES('小米',33),('华硕',33),('联想',33),('三星',33) ;
INSERT INTO type(typename, pid)VALUES('小米',34),('华硕',34),('联想',34),('三星',34) ;
 # 产品发布状态表
 DROP TABLE IF EXISTS poststatus ;
 CREATE TABLE IF NOT EXISTS poststatus(
   id        TINYINT        PRIMARY KEY        AUTO_INCREMENT ,
   status    VARCHAR(20)    NOT NULL
 ) ;
 INSERT INTO poststatus(status) VALUES ('已发布') ;
 INSERT INTO poststatus(status) VALUES ('未发布') ;
 INSERT INTO poststatus(status) VALUES ('已下架') ;


# 产品表
 DROP TABLE IF EXISTS product ;
 CREATE TABLE IF NOT EXISTS product(
   id           INT            PRIMARY KEY          AUTO_INCREMENT ,
   prodname     VARCHAR(20)    NOT NULL ,
   type         INT            NOT NULL ,    # 类型
   origprice    DECIMAL(10,2)  NULL     ,    # 原价
   price        DECIMAL(10,2)  NOT NULL ,    # 现价
   weight       CHAR(8)        NULL     ,    # 毛重
   num          INT            NOT NULL      DEFAULT   0 ,# 库存
   place        VARCHAR(50)    NOT NULL ,    # 产地
   proddate     INT            NOT NULL ,    # 生产日期
   expiredate   VARCHAR(15)    NOT NULL ,    # 保质期
   shelvedate   TIMESTAMP      NOT NULL      DEFAULT   current_timestamp  ON UPDATE current_timestamp,  # 上架时间
   contents     VARCHAR(500)   NOT NULL ,    # 产品的简单描述
   status       TINYINT        NOT NULL      DEFAULT   2 , # 产品状态表
   FOREIGN KEY (type)          REFERENCES    type(id) ,
   FOREIGN KEY (status)        REFERENCES    poststatus(id)
 ) ;

 # 产品图片表
 DROP TABLE IF EXISTS productimage ;
 CREATE TABLE IF NOT EXISTS productimage(
   id         INT            PRIMARY KEY          AUTO_INCREMENT ,
   image      VARCHAR(50)    NOT NULL  ,
   prodid     INT            NOT NULL ,
   FOREIGN KEY (prodid) REFERENCES product(id)
 ) ;
 # 位置表
 DROP TABLE IF EXISTS position ;
 CREATE TABLE IF NOT EXISTS position(
   id        TINYINT        PRIMARY KEY           AUTO_INCREMENT ,
   position  VARCHAR(20)    NOT NULL
 ) ;
 INSERT INTO position(position)VALUES ('推荐'),('热销'),('促销');
# 位置图片表
 DROP TABLE IF EXISTS positionimage ;
 CREATE TABLE IF NOT EXISTS positionimage(
   id        INT            PRIMARY KEY           AUTO_INCREMENT ,
   image     VARCHAR(50)    NOT NULL  ,
   position  TINYINT        NOT NULL  ,
   prodid    INT            NOT NULL  ,
   addtime   TIMESTAMP      NOT NULL  DEFAULT current_timestamp ON UPDATE current_timestamp ,
   FOREIGN KEY (prodid) REFERENCES type(id) ,
   FOREIGN KEY (position) REFERENCES position(id)
 ) ;
 SELECT * FROM positionimage img INNER JOIN position as p on img.position=p.position ;
# 购物车表
 DROP TABLE IF EXISTS shoppingcart ;
 CREATE TABLE IF NOT EXISTS shoppingcart(
   id           INT            PRIMARY KEY          AUTO_INCREMENT ,
   userid       INT            NOT NULL ,
   prodid       INT            NOT NULL ,
   num          INT            NOT NULL             DEFAULT      0 ,
   amount       DECIMAL(10,2)  NOT NULL ,
   FOREIGN KEY (userid) REFERENCES user(id) ,
   FOREIGN KEY (prodid) REFERENCES product(id)
 ) ;

 # 订单表
 DROP TABLE IF EXISTS indent ;
 CREATE TABLE IF NOT EXISTS indent(
   id           INT             PRIMARY KEY          AUTO_INCREMENT ,
   prodid       INT             NOT NULL ,
   cartid       INT             NOT NULL ,
   addtime      TIMESTAMP       NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp ,
   FOREIGN KEY (prodid) REFERENCES type(id) ,
   FOREIGN KEY (cartid) REFERENCES shoppingcart(id)
 ) ;

 # 商品配送表
 DROP TABLE IF EXISTS deliver ;
 CREATE TABLE IF NOT EXISTS deliver(
   id           INT               PRIMARY KEY        AUTO_INCREMENT ,
   userid       INT               NOT NULL ,
   indentid     INT               NOT NULL ,
   delivdate    INT               NOT NULL
 ) ;

 # 商品退货表
 DROP TABLE IF EXISTS reject ;
 CREATE TABLE IF NOT EXISTS reject(
   id           INT              PRIMARY KEY          AUTO_INCREMENT ,
   indentid     INT              NOT NULL ,
   userid       INT              NOT NULL ,
   prodid       INT              NOT NULL ,
   delivdate    INT              NOT NULL , # 配送日期
   reason       VARCHAR(100)     NOT NULL ,
   num          INT              NOT NULL ,
   FOREIGN KEY (indentid) REFERENCES indent(id) ,
   FOREIGN KEY (userid)   REFERENCES user(id) ,
   FOREIGN KEY (prodid)   REFERENCES product(id)
 ) ;







