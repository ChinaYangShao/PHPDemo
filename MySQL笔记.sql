修改表：
	通常，创建一个表能搞定(做到)的事情，修改表也能做到。大体可以分为以下几种:
		增删改字段：
			增：alter table 表名 add [column] 字段名 字段类型 字段属性;
			删：alter table 表名 drop 字段名;
			改：alter table 表名 change 原字段名 新字段名 新字段类型 新字段属性;
		增删索引：
		增删约束：
		修改表选项：

修改表的基本形式：
	alter table 表名 修改语句1,修改语句2,...;
删除表：
	drop table [if exists] 表名;

表的其他操作：
	show tables;  //显示所有的表；
	desc 表名;    //显示表结构；
	show create table 表名;   //显示表的创建语句；
	rename table 旧表名 to 新表名;  //重命名表；
	create table [if not exists] 新表名 like 原表名;   //从已有表复制表结构；


视图：
	视图创建形式：
		create view 视图名 as 一条复杂的select语句;

	视图的使用：
		select * from 视图名 where 条件 order by ...;  //其实就是当作一个查询表来用（通常只用于select）。

	修改视图：
		alter view 视图名 [(列名1,列名2,...)] as select语句;

	删除视图：
		drop view [if exists] 视图名;

		


数据库操作
	增： 
		形式1：
			insert into 表名 (字段名1, 字段名2, ....) values (值1, 值2, ...),(值1, 值2, ...), ...;
		形式2：
			insert into 表名 (字段名1, 字段名2, ....) select 字段名1, 字段名2, ... from 其他表名;
		形式3：
			insert into 表名 set 字段名1=值1, 字段名2=值2, ...;


	删： 

	改： 












