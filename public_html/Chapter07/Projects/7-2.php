<!DOCTYPE html>
<html>
<head>
<title>7.1</title>
</head>
<body>
<pre>
Last login: Thu Nov 19 11:45:30 on ttys000
Kennys-MBP:~ kennytran$ ssh ca86_21@php.missioncollege.edu
ca86_21@php.missioncollege.edu's password:
Welcome to Ubuntu 15.04 (GNU/Linux 3.19.0-21-generic i686)

* Documentation:  https://help.ubuntu.com/

System information as of Thu Nov 19 11:37:32 PST 2015

System load:  0.0               Processes:           134
Usage of /:   8.7% of 55.74GB   Users logged in:     2
Memory usage: 17%               IP address for eth0: 10.3.105.47
Swap usage:   1%

=> /boot is using 99.6% of 235MB

Graph this data and manage this system at:
https://landscape.canonical.com/

New release '15.10' available.
Run 'do-release-upgrade' to upgrade to it.

*** System restart required ***
Last login: Thu Nov 19 11:33:39 2015 from 76-198-28-190.lightspeed.sntcca.sbcglobal.net
ca86_21@php01:~$ mysql --local-infile -h localhost -u ca86_21 -p
Enter password:
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 410
Server version: 5.6.25-0ubuntu0.15.04.1 (Ubuntu)

Copyright (c) 2000, 2015, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> create table teamstats(Team varchar(50),FirstYear int,  G int, W int, L int, Pennants int, WS int,  R int, AB int, H int, HR int, AVG float,  RA int, ERA float);
ERROR 1046 (3D000): No database selected
mysql> use ca86_21
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> select database();
+------------+
| database() |
+------------+
| ca86_21    |
+------------+
1 row in set (0.00 sec)

mysql> create table teamstats(Team varchar(50),FirstYear int,  G int, W int, L int, Pennants int, WS int,  R int, AB int, H int, HR int, AVG float,  RA int, ERA float);
Query OK, 0 rows affected (0.02 sec)

mysql> describe teamstats;
+-----------+-------------+------+-----+---------+-------+
| Field     | Type        | Null | Key | Default | Extra |
+-----------+-------------+------+-----+---------+-------+
| Team      | varchar(50) | YES  |     | NULL    |       |
| FirstYear | int(11)     | YES  |     | NULL    |       |
| G         | int(11)     | YES  |     | NULL    |       |
| W         | int(11)     | YES  |     | NULL    |       |
| L         | int(11)     | YES  |     | NULL    |       |
| Pennants  | int(11)     | YES  |     | NULL    |       |
| WS        | int(11)     | YES  |     | NULL    |       |
| R         | int(11)     | YES  |     | NULL    |       |
| AB        | int(11)     | YES  |     | NULL    |       |
| H         | int(11)     | YES  |     | NULL    |       |
| HR        | int(11)     | YES  |     | NULL    |       |
| AVG       | float       | YES  |     | NULL    |       |
| RA        | int(11)     | YES  |     | NULL    |       |
| ERA       | float       | YES  |     | NULL    |       |
+-----------+-------------+------+-----+---------+-------+
14 rows in set (0.01 sec)

mysql> load data infile '/tmp/team_stats.txt' into table teamstats;
ERROR 1045 (28000): Access denied for user 'ca86_21'@'localhost' (using password: YES)
mysql> load data local infile '/tmp/team_stats.txt' into table teamstats;       Query OK, 30 rows affected (0.00 sec)
Records: 30  Deleted: 0  Skipped: 0  Warnings: 0

mysql> select * from teamstats;
+-------------------------------+-----------+-------+-------+-------+----------+------+-------+--------+--------+-------+-------+-------+------+
| Team                          | FirstYear | G     | W     | L     | Pennants | WS   | R     | AB     | H      | HR    | AVG   | RA    | ERA  |
+-------------------------------+-----------+-------+-------+-------+----------+------+-------+--------+--------+-------+-------+-------+------+
| Arizona Diamondbacks          |      1998 |  1819 |   914 |   905 |        1 |    1 |  8379 |  62131 |  16137 |  1933 |  0.26 |  8422 | 4.26 |
| Atlanta Braves                |      1876 | 19764 |  9786 |  9825 |       17 |    3 | 88243 | 677310 | 176434 | 12203 |  0.26 | 87693 | 3.65 |
| Baltimore Orioles             |      1901 | 16861 |  7965 |  8786 |        7 |   26 | 72633 | 572146 | 148197 | 11335 | 0.259 | 77029 | 3.99 |
| Boston Red Sox                |      1901 | 16848 |  8657 |  8108 |       12 |    7 | 77981 | 575510 | 153781 | 11671 | 0.267 | 75352 | 3.88 |
| Chicago Cubs                  |      1876 | 19796 | 10103 |  9537 |       16 |    2 | 91616 | 678492 | 178828 | 12479 | 0.264 | 88269 | 3.66 |
| Chicago White Sox             |      1901 | 16855 |  8476 |  8276 |        6 |    3 | 73603 | 570404 | 148833 |  9662 | 0.261 | 72730 | 3.73 |
| Cincinnati Reds               |      1882 | 19382 |  9766 |  9480 |       10 |    5 | 87300 | 661241 | 173334 | 11533 | 0.262 | 86119 | 3.71 |
| Cleveland Indians             |      1901 | 16863 |  8571 |  8201 |        5 |    2 | 76441 | 575356 | 153431 | 11338 | 0.267 | 74685 | 3.82 |
| Colorado Rockies              |      1993 |  2565 |  1203 |  1362 |        1 |    0 | 13426 |  88540 |  24687 |  2944 | 0.279 | 14085 | 5.17 |
| Detroit Tigers                |      1901 | 16885 |  8497 |  8295 |       10 |    4 | 78163 | 575699 | 152746 | 12050 | 0.265 | 77194 | 3.96 |
| Florida Marlins               |      1993 |  2561 |  1214 |  1347 |        2 |    2 | 11353 |  87282 |  22744 |  2392 | 0.261 | 12150 | 4.39 |
| Houston Astros                |      1962 |  7526 |  3754 |  3766 |        1 |    0 | 31521 | 255339 |  65127 |  5533 | 0.255 | 31387 | 3.75 |
| Kansas City Royals            |      1969 |  6380 |  3097 |  3281 |        2 |    1 | 28357 | 218508 |  57869 |  4777 | 0.265 | 29341 |  4.2 |
| Los Angeles Angels of Anaheim |      1961 |  7684 |  3808 |  3873 |        1 |    1 | 32963 | 260842 |  67180 |  6374 | 0.258 | 33437 | 3.94 |
| Los Angeles Dodgers           |      1884 | 19185 |  9985 |  9063 |       22 |    6 | 86117 | 654177 | 171436 | 11154 | 0.262 | 82189 | 3.54 |
| Milwaukee Brewers             |      1969 |  6387 |  3031 |  3352 |        1 |    0 | 28365 | 217387 |  56262 |  5794 | 0.259 | 29478 | 4.21 |
| Minnesota Twins               |      1901 | 16869 |  8069 |  8691 |        6 |    3 | 73789 | 575390 | 151683 |  9232 | 0.264 | 76764 | 3.94 |
| New York Mets                 |      1962 |  7518 |  3606 |  3904 |        4 |    2 | 30637 | 254460 |  63737 |  5941 |  0.25 | 31404 | 3.75 |
| New York Yankees              |      1901 | 16836 |  9491 |  7252 |       39 |   26 | 81894 | 574293 | 153682 | 13914 | 0.268 | 70675 | 3.63 |
| Oakland Athletics             |      1901 | 16818 |  8127 |  8604 |       15 |    9 | 74389 | 570335 | 147976 | 11408 | 0.259 | 77323 | 3.99 |
| Philadelphia Phillies         |      1883 | 19190 |  8964 | 10114 |        6 |    2 | 85314 | 657092 | 172008 | 11457 | 0.262 | 90976 | 3.97 |
| Pittsburgh Pirates            |      1882 | 19343 |  9706 |  9501 |        9 |    5 | 87028 | 663975 | 176269 |  9970 | 0.265 | 85954 |  3.7 |
| San Diego Padres              |      1969 |  6393 |  2948 |  3443 |        2 |    0 | 25778 | 216951 |  54721 |  4799 | 0.252 | 28161 | 3.96 |
| San Francisco Giants          |      1883 | 19263 | 10274 |  8832 |       20 |    5 | 90107 | 657818 | 174147 | 13262 | 0.265 | 82904 | 3.56 |
| Seattle Mariners              |      1977 |  5098 |  2393 |  2703 |        0 |    0 | 23395 | 174802 |  46262 |  4967 | 0.265 | 24578 | 4.45 |
| St. Louis Cardinals           |      1882 | 19387 |  9950 |  9286 |       21 |   10 | 89091 | 665624 | 177650 | 10504 | 0.267 | 86128 | 3.68 |
| Tampa Bay Rays                |      1998 |  1817 |   760 |  1057 |        1 |    0 |  8095 |  62386 |  16374 |  1713 | 0.262 |  9599 |  4.9 |
| Texas Rangers                 |      1961 |  7671 |  3592 |  4073 |        0 |    0 | 34233 | 262238 |  67976 |  7249 | 0.259 | 36295 | 4.28 |
| Toronto Blue Jays             |      1977 |  5101 |  2539 |  2559 |        2 |    2 | 23597 | 175373 |  46322 |  5018 | 0.264 | 23389 | 4.21 |
| Washington Nationals          |      1969 |  6385 |  3050 |  3330 |        0 |    0 | 26235 | 216094 |  54832 |  4946 | 0.254 | 27732 | 3.91 |
+-------------------------------+-----------+-------+-------+-------+----------+------+-------+--------+--------+-------+-------+-------+------+
30 rows in set (0.00 sec)

mysql> clear
mysql> ;
ERROR:
No query specified

mysql> exit
Bye
ca86_21@php01:~$ exit
logout
Connection to php.missioncollege.edu closed.
Kennys-MBP:~ kennytran$ clear

Kennys-MBP:~ kennytran$ ssh ca86_21@php.missioncollege.edu
ca86_21@php.missioncollege.edu's password:
Permission denied, please try again.
ca86_21@php.missioncollege.edu's password:
Welcome to Ubuntu 15.04 (GNU/Linux 3.19.0-21-generic i686)

* Documentation:  https://help.ubuntu.com/

System information as of Thu Nov 19 11:52:10 PST 2015

System load:  0.0               Processes:           132
Usage of /:   8.7% of 55.74GB   Users logged in:     1
Memory usage: 17%               IP address for eth0: 10.3.105.47
Swap usage:   1%

=> /boot is using 99.6% of 235MB

Graph this data and manage this system at:
https://landscape.canonical.com/

New release '15.10' available.
Run 'do-release-upgrade' to upgrade to it.

*** System restart required ***
Last login: Thu Nov 19 11:37:32 2015 from 76-198-28-190.lightspeed.sntcca.sbcglobal.net
ca86_21@php01:~$ mysql --local-infile -h localhost -u ca86_21 -p
Enter password:
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 411
Server version: 5.6.25-0ubuntu0.15.04.1 (Ubuntu)

Copyright (c) 2000, 2015, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> use ca86_21
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> select team, G, AB from teamstats;
+-------------------------------+-------+--------+
| team                          | G     | AB     |
+-------------------------------+-------+--------+
| Arizona Diamondbacks          |  1819 |  62131 |
| Atlanta Braves                | 19764 | 677310 |
| Baltimore Orioles             | 16861 | 572146 |
| Boston Red Sox                | 16848 | 575510 |
| Chicago Cubs                  | 19796 | 678492 |
| Chicago White Sox             | 16855 | 570404 |
| Cincinnati Reds               | 19382 | 661241 |
| Cleveland Indians             | 16863 | 575356 |
| Colorado Rockies              |  2565 |  88540 |
| Detroit Tigers                | 16885 | 575699 |
| Florida Marlins               |  2561 |  87282 |
| Houston Astros                |  7526 | 255339 |
| Kansas City Royals            |  6380 | 218508 |
| Los Angeles Angels of Anaheim |  7684 | 260842 |
| Los Angeles Dodgers           | 19185 | 654177 |
| Milwaukee Brewers             |  6387 | 217387 |
| Minnesota Twins               | 16869 | 575390 |
| New York Mets                 |  7518 | 254460 |
| New York Yankees              | 16836 | 574293 |
| Oakland Athletics             | 16818 | 570335 |
| Philadelphia Phillies         | 19190 | 657092 |
| Pittsburgh Pirates            | 19343 | 663975 |
| San Diego Padres              |  6393 | 216951 |
| San Francisco Giants          | 19263 | 657818 |
| Seattle Mariners              |  5098 | 174802 |
| St. Louis Cardinals           | 19387 | 665624 |
| Tampa Bay Rays                |  1817 |  62386 |
| Texas Rangers                 |  7671 | 262238 |
| Toronto Blue Jays             |  5101 | 175373 |
| Washington Nationals          |  6385 | 216094 |
+-------------------------------+-------+--------+
30 rows in set (0.00 sec)

mysql> select team, G, AB from teamstats order by team;
+-------------------------------+-------+--------+
| team                          | G     | AB     |
+-------------------------------+-------+--------+
| Arizona Diamondbacks          |  1819 |  62131 |
| Atlanta Braves                | 19764 | 677310 |
| Baltimore Orioles             | 16861 | 572146 |
| Boston Red Sox                | 16848 | 575510 |
| Chicago Cubs                  | 19796 | 678492 |
| Chicago White Sox             | 16855 | 570404 |
| Cincinnati Reds               | 19382 | 661241 |
| Cleveland Indians             | 16863 | 575356 |
| Colorado Rockies              |  2565 |  88540 |
| Detroit Tigers                | 16885 | 575699 |
| Florida Marlins               |  2561 |  87282 |
| Houston Astros                |  7526 | 255339 |
| Kansas City Royals            |  6380 | 218508 |
| Los Angeles Angels of Anaheim |  7684 | 260842 |
| Los Angeles Dodgers           | 19185 | 654177 |
| Milwaukee Brewers             |  6387 | 217387 |
| Minnesota Twins               | 16869 | 575390 |
| New York Mets                 |  7518 | 254460 |
| New York Yankees              | 16836 | 574293 |
| Oakland Athletics             | 16818 | 570335 |
| Philadelphia Phillies         | 19190 | 657092 |
| Pittsburgh Pirates            | 19343 | 663975 |
| San Diego Padres              |  6393 | 216951 |
| San Francisco Giants          | 19263 | 657818 |
| Seattle Mariners              |  5098 | 174802 |
| St. Louis Cardinals           | 19387 | 665624 |
| Tampa Bay Rays                |  1817 |  62386 |
| Texas Rangers                 |  7671 | 262238 |
| Toronto Blue Jays             |  5101 | 175373 |
| Washington Nationals          |  6385 | 216094 |
+-------------------------------+-------+--------+
30 rows in set (0.00 sec)

mysql> select team, G, AB from teamstats order by teamd DESc;
ERROR 1054 (42S22): Unknown column 'teamd' in 'order clause'
mysql> select team, G, AB from teamstats order by team DESc;
+-------------------------------+-------+--------+
| team                          | G     | AB     |
+-------------------------------+-------+--------+
| Washington Nationals          |  6385 | 216094 |
| Toronto Blue Jays             |  5101 | 175373 |
| Texas Rangers                 |  7671 | 262238 |
| Tampa Bay Rays                |  1817 |  62386 |
| St. Louis Cardinals           | 19387 | 665624 |
| Seattle Mariners              |  5098 | 174802 |
| San Francisco Giants          | 19263 | 657818 |
| San Diego Padres              |  6393 | 216951 |
| Pittsburgh Pirates            | 19343 | 663975 |
| Philadelphia Phillies         | 19190 | 657092 |
| Oakland Athletics             | 16818 | 570335 |
| New York Yankees              | 16836 | 574293 |
| New York Mets                 |  7518 | 254460 |
| Minnesota Twins               | 16869 | 575390 |
| Milwaukee Brewers             |  6387 | 217387 |
| Los Angeles Dodgers           | 19185 | 654177 |
| Los Angeles Angels of Anaheim |  7684 | 260842 |
| Kansas City Royals            |  6380 | 218508 |
| Houston Astros                |  7526 | 255339 |
| Florida Marlins               |  2561 |  87282 |
| Detroit Tigers                | 16885 | 575699 |
| Colorado Rockies              |  2565 |  88540 |
| Cleveland Indians             | 16863 | 575356 |
| Cincinnati Reds               | 19382 | 661241 |
| Chicago White Sox             | 16855 | 570404 |
| Chicago Cubs                  | 19796 | 678492 |
| Boston Red Sox                | 16848 | 575510 |
| Baltimore Orioles             | 16861 | 572146 |
| Atlanta Braves                | 19764 | 677310 |
| Arizona Diamondbacks          |  1819 |  62131 |
+-------------------------------+-------+--------+
30 rows in set (0.00 sec)

mysql> select team, HR from teamstats order by hr limit 1;
+----------------+------+
| team           | HR   |
+----------------+------+
| Tampa Bay Rays | 1713 |
+----------------+------+
1 row in set (0.00 sec)

mysql> select team, HR from teamstats order by HR desc limit 1;
+------------------+-------+
| team             | HR    |
+------------------+-------+
| New York Yankees | 13914 |
+------------------+-------+
1 row in set (0.00 sec)

mysql> select sum(g)/2 from teamstasts;
ERROR 1146 (42S02): Table 'ca86_21.teamstasts' doesn't exist
mysql> select sum(g)/2 from teamstats;
+-------------+
| sum(g)/2    |
+-------------+
| 182525.0000 |
+-------------+
1 row in set (0.00 sec)

mysql> select avg(avg) from teamstats;
+---------------------+
| avg(avg)            |
+---------------------+
| 0.26199999650319417 |
+---------------------+
1 row in set (0.00 sec)

mysql> select sum(avg*ab)/sum(ab) from teamstats;
+---------------------+
| sum(avg*ab)/sum(ab) |
+---------------------+
|  0.2625602253617602 |
+---------------------+
1 row in set (0.00 sec)

mysql>

</pre>
</body>
</html>