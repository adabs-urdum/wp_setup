# wp-setup

## Setup Neues Projekt
1. 	Projekt auf Github erstellen
2. 	"Clone or download"-Button -> Clone with SSH -> Link kopieren
3. 	Im Terminal `cd "Pfad-Zum-Projektordner"`
4. 	`git clone ⌘v`
5. 	`cd "Projektname"`
6. 	`valet link`
7.  Datenbank einrichten. (Sequel Pro öffnen, mit localhost/127.0.0.1 verbinden, neue Datenbank erstellen)
8. 	`open .`
9.  Den Inhalt dieses WP Setup Ordners in den Projektordner kopieren.
10.	Projekt im Editor öffnen.
11. wp-config.php öffnen. DB_NAME eintragen, DB_USER == 'root', DB_PASSWORD == '', DB_HOST == 'localhost'
12. AUTH_KEY Block setzen.
13. Unter wp-content/themes den Namen vom Ordner wp-setup dem Projekt anpassen
14.	`cd wp-content/themes/"Themename"`
15.	`npm install`
16.	`valet links`
17. Entsprechende URL kopieren
18. `https=false url=⌘v npm run watch:all` *falls error -> url mit https setzen und nochmals versuchen*
19. Ins /wp-admin zu den Plugins wechseln
20. Advanced Custom Fields PRO Aktivieren.
21. Im Panel zu Eigene Felder / Custom Fields -> Werkzeuge wechseln.
22. File importieren -> Im Projektordner acf_preset.json auswählen.
23. Im Panel zu Design -> Themes wechseln und das Theme "CLUS WP Setup" aktivieren.
24. Im Panel Einstellungen -> Allgemein bei "WordPress-Adresse" und "Website-Adresse" die Valet-Links-URL eintragen.
25. Eine Home-Seite erstellen.
26. Im Panel Einstellungen -> Lesen. "Eine statische Seite" anwählen und Homepage und Beitragsseite auf Home einstellen.
