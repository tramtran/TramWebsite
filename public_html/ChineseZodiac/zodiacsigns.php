<DOCTYPE html>
<html>
<head>
<title>Zodiac Signs Table</title>
</head>
<body>
<pre>
Last login: Thu Nov 19 11:49:31 on ttys000
Kennys-MBP:~ kennytran$ ssh ca86_33@php.missioncollege.edu
ca86_33@php.missioncollege.edu's password:
Welcome to Ubuntu 15.04 (GNU/Linux 3.19.0-21-generic i686)

* Documentation:  https://help.ubuntu.com/

System information as of Thu Nov 19 12:06:03 PST 2015

System load:  0.08              Processes:           140
Usage of /:   8.7% of 55.74GB   Users logged in:     2
Memory usage: 17%               IP address for eth0: 10.3.105.47
Swap usage:   1%

=> /boot is using 99.6% of 235MB

Graph this data and manage this system at:
https://landscape.canonical.com/

New release '15.10' available.
Run 'do-release-upgrade' to upgrade to it.

*** System restart required ***
ca86_33@php01:~$ mysql --local-infile -h localhost -u ca86_33 -p
Enter password:
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 414
Server version: 5.6.25-0ubuntu0.15.04.1 (Ubuntu)

Copyright (c) 2000, 2015, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> show databases
-> ;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| ca86_33            |
+--------------------+
2 rows in set (0.01 sec)

mysql> create database chinise_zodiac;
ERROR 1044 (42000): Access denied for user 'ca86_33'@'localhost' to database 'chinise_zodiac'
mysql> use ca86_33
Database changed
mysql> select database();
+------------+
| database() |
+------------+
| ca86_33    |
+------------+
1 row in set (0.00 sec)

mysql> create table zodiacsigns (Sign varchar(10), President varchar(75));
Query OK, 0 rows affected (0.02 sec)

mysql> describe zodiacsigns;
+-----------+-------------+------+-----+---------+-------+
| Field     | Type        | Null | Key | Default | Extra |
+-----------+-------------+------+-----+---------+-------+
| Sign      | varchar(10) | YES  |     | NULL    |       |
| President | varchar(75) | YES  |     | NULL    |       |
+-----------+-------------+------+-----+---------+-------+
2 rows in set (0.00 sec)

mysql> insert into zodiacsigns (Sign, President)
-> values('Rat' , 'George Washington');
Query OK, 1 row affected (0.00 sec)

mysql> insert into zodiacsigns (Sign, President) values('Ox' , 'Barack Obama');
Query OK, 1 row affected (0.01 sec)

mysql> insert into zodiacsigns (Sign, President) values('Tiger' , 'Dwight Eisenhower');
Query OK, 1 row affected (0.00 sec)

mysql> insert into zodiacsigns (Sign, President) values('Rabbit' , 'John Adams');
Query OK, 1 row affected (0.00 sec)

mysql> insert into zodiacsigns (Sign, President) values('Dragon' , 'Abraham Lincoln');
Query OK, 1 row affected (0.01 sec)

mysql> insert into zodiacsigns (Sign, President) values('Snake' , 'John Kennedy');
Query OK, 1 row affected (0.01 sec)

mysql> insert into zodiacsigns (Sign, President) values('Horse' , 'Theodore Roosevelt');
Query OK, 1 row affected (0.00 sec)

mysql> insert into zodiacsigns (Sign, President) values('Goat' , 'James Madison');
Query OK, 1 row affected (0.01 sec)

mysql> insert into zodiacsigns (Sign, President) values('Monkey' , Harry Truman'');
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Truman'')' at line 1
mysql> insert into zodiacsigns (Sign, President) values('Monkey' , 'Harry Truman');
Query OK, 1 row affected (0.00 sec)

mysql> insert into zodiacsigns (Sign, President) values('Rooster' , 'Grover Cleveland');
Query OK, 1 row affected (0.00 sec)

mysql> insert into zodiacsigns (Sign, President) values('Dog' , 'George Walker Bush');
Query OK, 1 row affected (0.00 sec)

mysql> insert into zodiacsigns (Sign, President) values('Pig' , 'Ronald Reagan');
Query OK, 1 row affected (0.01 sec)

mysql> select * from zodiacsigns
-> ;
+---------+--------------------+
| Sign    | President          |
+---------+--------------------+
| Rat     | George Washington  |
| Ox      | Barack Obama       |
| Tiger   | Dwight Eisenhower  |
| Rabbit  | John Adams         |
| Dragon  | Abraham Lincoln    |
| Snake   | John Kennedy       |
| Horse   | Theodore Roosevelt |
| Goat    | James Madison      |
| Monkey  | Harry Truman       |
| Rooster | Grover Cleveland   |
| Dog     | George Walker Bush |
| Pig     | Ronald Reagan      |
+---------+--------------------+
12 rows in set (0.00 sec)

mysql>

</pre>
</body>
</html>