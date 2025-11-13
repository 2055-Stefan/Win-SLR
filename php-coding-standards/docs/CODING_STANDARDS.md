# Coding Standards – PSR-12 Leitfaden

## Ziel
Das Projekt hält sich an die [PSR-12-Richtlinien](https://www.php-fig.org/psr/psr-12/), um einheitlichen und wartbaren PHP-Code sicherzustellen.

## Tools
- **PHP CS Fixer** – automatisches Formatieren  
- **GitHub Actions** – automatischer Style-Check bei jedem Commit  
- **Composer-Script** `composer fix` – lokale Formatierung  
- **VS Code** – Formatierung beim Speichern aktiviert

## Regeln
- Code ist **PSR-12-konform**.  
- Keine unbenutzten `use`-Anweisungen.  
- Nur Short-Arrays `[]` und `'single quotes'` ohne Variablen.  
- 4 Leerzeichen Einrückung, keine Tabs.  
- Jede Datei endet mit einer Leerzeile.

## Ablauf
1. Code wird beim Speichern automatisch formatiert.  
2. Vor jedem Commit wird `composer fix` ausgeführt.  
3. GitHub Actions prüft den Code-Style bei jedem Push.  
4. Verstöße müssen lokal behoben und erneut gepusht werden, bevor ein Merge möglich ist.

## Team und Abweichungen
Alle Teammitglieder kennen den PSR-12-Standard und den Umgang mit dem PHP CS Fixer.  
Bei Style-Verstößen:
1. Die CI-Pipeline zeigt betroffene Dateien.  
2. Entwickler führt `composer fix` aus.  
3. Nach erneutem Push wird der Check grün (erfolgreich).

## Quellen
- [PSR-12 Standard](https://www.php-fig.org/psr/psr-12/)  
- [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)