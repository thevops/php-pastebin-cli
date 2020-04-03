# php-pastebin-cli
PHP (on backend) command line pastebin.
There are two versions of application.

Similiar to http://sprunge.us/ or https://termbin.com/

---

First is simple.
Application receive text and save it to random file. Next return unique URL.


Use:
1. Put `index.php` in some domain directory, for example: https://domain.com/logs/
2. To send data, run: `echo "some text" | curl -F 'text=<-' https://domain.com/logs/simple.php`
3. You will get unique link to your text, for example `https://domain.com/logs/n/7avgsd76`

---

Second version has more functions - auto deleting file after specific time - in days or minutes.

Method of use is similiar, except curl:

`echo "some text" | curl -F 'text=<-' https://domain.com/logs/extended.php?d=XX` - for days limit

or

`echo "some text" | curl -F 'text=<-' https://domain.com/logs/extended.php?m=XX` - for minutes limit

For automate delete notes add script to system cron.
`* * * * * /bin/bash /path/to/script/delete.sh`
