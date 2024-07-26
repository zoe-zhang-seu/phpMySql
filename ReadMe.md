## Tools used during learning
- ChatGPT 
- PHP & MySQL - the missing manual - brett mclaughlin (inspiration , is following this books mainly) Many hook in the books are no longer supported by php from php 7
- HTML5 programming with javascript for dummies by John Paul Mudeller (not very related)
- Programming php - O'Reilly version - a lot of authors ()


## MAMP usage

 my local not able to work at web server Apache.

 so i set up MAMP, the version could be old, anyway just make it run it is fine.
- web server: nginx 
- php version : 7.3.24
- preference / nginx port : 8081 
- preference / mysql port : 3307
- preference / use mysql server 5.7.44
- preference / General / all checked 

The reason why i use MAMP, is rent a book from library , need to return in August. it suggest to use MAMP. also install mysql, php locally, list a lot of good points to instal database locally. 

## the way to open mysql in MAMP
```bash
/Applications/MAMP/Library/bin/mysql57/bin/mysql -uroot -p

//password is root
```
- tried vi ~/.bash_file to enable use mysql directly, didn't working.

the php 7.3.24 is tooooooo old, that it didn't support enum, not support define the type in the class. will update to at least 8.2. (mainly because the local system out of date, need update. but mac is showing checking updating for about half an hour... need update the system)



