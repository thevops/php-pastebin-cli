# php-pastebin-cli
Simple PHP command line pastebin

Similiar to http://sprunge.us/ or https://termbin.com/

---

Application receive text and save it to random file. Next return unique URL.

---

Use:
1. Put `index.php` in some domain directory, for example: https://domain.com/logs/
2. To send data, run: `echo "some text" | curl -F 'text=<-' https://domain.com/logs/`
3. You will get unique link to your text, for example `https://domain.com/logs/7avgsd76`

