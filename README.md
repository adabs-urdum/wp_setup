# wp-setup

## Setup
1. 	Projekt auf Github erstellen / Existierendes Projekt auf Github finden
2. 	"Clone or download"-Button -> Clone with SSH -> Link kopieren
3. 	Im Terminal `cd "Pfad-Zum-Projektordner"`
4. 	`git clone ⌘v`
5. 	`cd "Projektname"`
6. 	`valet link`
7.  Datenbank einrichten. (Sequel Pro öffnen, mit localhost/127.0.0.1 verbinden, neue Datenbank erstellen)
8. 	`open .`
9.	Projekt im Editor öffnen.
10. wp-config.php öffnen. DB_NAME eintragen, DB_USER == 'root', DB_PASSWORD == '', DB_HOST == 'localhost'
11. AUTH_KEY Block setzen.
12. Falls neues Projekt unter wp-content/themes den Namen vom Ordner wp-setup dem Projekt anpassen
13.	`cd wp-content/themes/"Themename"`
14.	`npm install`
15.	`valet links`
16. Entsprechende URL kopieren
17. `https=false url=⌘v npm run watch:all` *falls error -> url mit https setzen und nochmals versuchen*
18. Ins /wp-admin zu den Plugins wechseln
19. Advanced Custom Fields PRO Aktivieren.
20. Im Panel zu Eigene Felder / Custom Fields -> Werkzeuge wechseln.
21. File importieren -> Im Projektordner acf_preset.json auswählen.
22. Im Panel zu Design -> Themes wechseln und das Theme "CLUS WP Setup" aktivieren.
23. Im Panel Einstellungen -> Allgemein bei "WordPress-Adresse" und "Website-Adresse" die Valet-Links-URL eintragen.
24. Eine Home-Seite erstellen.
25. Im Panel Einstellungen -> Lesen. "Eine statische Seite" anwählen und Homepage und Beitragsseite auf Home einstellen.