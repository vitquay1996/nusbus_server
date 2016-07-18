NUS bus server code
==============================

Handle queries from client app on Android.

#Note

- cron is used on server to trigger schedule.php every minute.
- To check cron, type on terminal
```
crontab -e

```
- Line added 
```
0-59 * * * * php /var/www/html/quang/nusbus/schedule.php
```


