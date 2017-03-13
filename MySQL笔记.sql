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
					%  :  任意个任意字符;
					_  :  一个任意字符;

		[order by子句]：排序
			形式：order by 排序字段1 [排序方式], 排序字段2 [排序方式], ...
			排序只有两种方式：
				正序：ASC  # 默认值，可以省略
				倒序：DESC

		[limit子句]:	常用于分页处理，表示将前面取得的数据从第几行连续多少行，如果没有那么多行数据，则取到最后。
			形式：limit [起始行号 start], 要取出的行数 num

	链接查询
		基本含义：
			链接就是指两个或两个以上的表（数据源）连起来成为一个数据源。
		链接语法的基本形式：
			from 表1 [链接方式] join 表2 [on 链接条件];
		链接方式有以下几种：
			交叉链接：
				实际上，交叉链接是将两个表不设定任何条件的链接结果，交叉链接通常页被叫做“笛卡尔积” ----数学上可能比较多。
				语法：
					from 表1 [cross] join 表2;  # cross这个词页可以省略，也可以使用inner这个词替代。


			内连接：
				语法：
					from 表1 [inner] join 表2 on 表1.字段1=表2.字段2;
				含义：
					找出（过滤）在交叉链接的结果表中的 表1中的字段1的值等于表2中的字段2的值 的那些行。
			
			左[外]连接：
				语法：
					from 表1 [inner] left join 表2 on 表1.字段1=表2.字段2;
				说明：
					1、这里 left 是关键字。
					2、链接条件跟内连接一样。
					3、含义是：在内连接的结果基础上，加上左边表中所有不符合链接条件的数据，相应本应该放右边表的字段的位置就自动补为"null"值。

			右[外]连接：
				语法：
					from 表1 [inner] right join 表2 on 表1.字段1=表2.字段2;
					说明：
					1、这里 right 是关键字。
					2、链接条件跟内连接一样。
					3、含义是：在内连接的结果基础上，加上右边表中所有不符合链接条件的数据，相应本应该放左边表的字段的位置就自动补为"null"值。
					






























