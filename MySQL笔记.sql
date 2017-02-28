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


	删： delete from 表名 where xx=xxx and xxx = xxx or xxx = xxx;

	改： update 表名 set xx=xx,xxx=xx where xxx=xxx and xxx=xxx;

	查：select [all | distinct] 字段或表达式列表 [from子句][where子句][group by子句][having子句][order by子句][limit子句];
		[all | distinct]：用于设定所select出来的数据是否允许出现重复行(完全相同的数据行)
			all : 允许出现 --- 默认是允许的。
			distinct : 不允许出现 --- 就是所谓的“消除重复行”
		[from子句]：就是指定数据的来源，其实就是‘表’，可以是一个表，也可以是多个表。
		[where子句]： 也就是条件判断语句，类似if语句。
			where 中可用的运算符：
				算术运算符：+  - *  /  %
				比较运算符：>  >= <  <=  =(等于，并不是赋值)  <>(不等于)  ==(等于，MySQL扩展)  !=(不等于，MySQL扩展)
				逻辑运算符：and(与)  or（或）  not(非)
			between 语法：XX between 值1 and 值2；
				含义：字段XX的值在值1和值2之间(含)，XX>=值1 and XX<=值2;

			in 语法：XX in(值1,值2,...);
				含义：XX等于其中列出来的任何一个值都算成立，相当于：XX=值1 or XX=值2 or ...;

			like 语法(模糊查找)： XX like '要查找的字符';
				特殊字符：
					%  :  任意个任意字符
					_  :  一个任意字符



















