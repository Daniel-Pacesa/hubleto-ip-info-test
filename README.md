# IpInfoTest

Hubleto Custom aplikácia na zistenie informácií o IP adrese s možnostou uloženia medzi obľúbené IP adresy

# Funkcionalita
1. Možnosť zadať IP adresu, ak prázdne - vaša aktualna IP adresa
2. Načítanie údajov o IP adrese z: https://api.techniknews.net/ipgeo/
3. Uloženie IP adresy do obľúbených
4. Zobrazenie uložených obľúbených IP adries a informácie o nich

# Inštalácia
   Importujte súbor `custom_ip_favorites.sql` do databázy.
   Aplikácia predpokladá názov databázy `hubleto_db`.
   Ak sa vaša lokálna databáza volá inak, upravte názov databázy v súbore:
   `IpInfoTest/Models/IpFavorite.php`

# Vyhlásenie
Pri vypracovaní bolo použité AI (Gemini/ChatGPT) na:
    - Pomoc s inštaláciou frameworku Hubleto
    - Ľadenie programu
    - Pomoc zo zaslaním údajov o IP adrese z javascriptu do PHP