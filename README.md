# Spletno_programiranje_2

Najprej uporabim datoteki index.php in process.php.
Najprej se poveže na bazo phpMyAdmin, kjer imam shranjenih že nekaj podatkov, ki se izpišejo na zaslon v tabelo. 
Nato lahko dodajam s pomočjo obrazca, ki uporablja metodo POST, in se nahaja pod tabelo. V obrazec vnesemo podatke in kliknemo gumb Dodaj in podatki se dodajo v tabelo in izpiše se nam opozorilo, da so podatki Uspešno shranjeni!.
V tabeli imamo dva gumba Uredi in Izbriši. 
Ko kliknemo gumb Izbriši se kliče metoda GET, ki s pomočjo id-ja izbriše podatke v vrstici, kjer smo kliknili Izbriši. Izpiše se nam opozorilo Uspešno izbrisano!
Ko kliknemo gumb Uredi se kliče metoda GET, ki nam v obrazec za dodajanje izpiše shranjene podatke, ki jih želimo spremeniti. Gumb Dodaj se spremeni v gumb Uredi, ki ob kliku kliče metodo POST, ki ponovno shrani nove podatke v bazo in jih izpiše v tabelo ter javi opozorilo Uspešno posodobljeno.

Podatki se shranjujejo v obliki array in se tako tudi izpisujejo. Za izpis podatkov v JSON lahko uporabimo datoteko json.php.
Dodana je tudi datoteka .htaccess.
