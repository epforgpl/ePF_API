ePF_API - Dane publiczne dostępne jak nigdy wcześniej!
------------------------------------------------------

To jest oficjalny klient platformy ePF_API. Umożliwia pobieranie danych publicznych, udostępnianych na portalu http://sejmometr.pl.
Zobacz więcej informacji o platformie ePF_API na stronie http://sejmometr.pl/api.
Dokumentacja klienta jest dostępna pod adresem http://sejmometr.pl/api/docs.

Aktualną wersję można pobrać z https://github.com/epforgpl/ePF_API


ePF_API daje dostęp do danych publicznych, pochodzących od wielu instytucji publicznych. Znajdziesz tu m.in.:

* Dokładne dane o pracach legislacyjnych (zintegrowane bazy Rady Ministrów, Sejmu, Senatu oraz Prezydenta RP),
* Akty prawne publikowane w Dzienniku Ustaw i Monitorze Polskim od 1918 r. (bazy Rządowego Centrum Legislacyjnego),
* Wersje ujednolicone aktów prawnych oraz powiązania między nimi opracowywane przez pracowników Kancelarii Sejmu (baza ISAP),
* Orzeczenia sądów administracyjnych, Sądu Najwyższego oraz sądów powszechnych,
* Dane teleadresowe instytucji państowywych w tym jednostek samorządu terytorialnego,
* Dane geodezyjne granic gmin, powiatów, województw i okręgów wyborczych,
* Wyniki wyborów samorządowych oraz parlamentarnych,
* Wskaźniki ekonomiczne i socjalne (Bank Danych Lokalnych oraz inne bazy Głównego Urzędu Statystycznego).

Przykład użycia
---------------

Wyszukiwanie danych publicznych, w których występuje fraza "Informacja publiczna":
		
		require_once('ePF_API/ep_API.php');
		
		$searcher = new ep_Search();
		$searcher->setQ('"Informacja publiczna"');
		$searcher->load();
		
		$objects = $searcher->getObjects();
		$pagination = $searcher->getPagination();
		
Zmienna $objects jest teraz tablicą 20 obiektów. Każdy taki obiekt, w swojej właściwości data zawiera opisujące go dane.

Zmienna $pagination jest tablicą asocjacyjną zawierającą pola:
* total - liczba wszystkich obiektów spełniających warunki wyszukiwania
* limit - liczba obiektów zwróconych w bieżącym wywołaniu metody load()
* page - numer strony wyników

Aby regulować ilość zwracanych wyników i poruszać się po wszystkich stronach wyników, użyj parametrów metody load(), np:

		$searcher->load(30, 2);

zwróci 30 wyników, poczynając od strony nr 2.



Pobieranie listy posłów na Sejm:
		
		require_once('ePF_API/ep_API.php');
		
		$searcher = new ep_Search();
		$searcher->setDataset('poslowie');
		$searcher->load();
		
		$objects = $searcher->getObjects();
		$pagination = $searcher->getPagination();


Warunki korzystania
-------------------

Wydawcą portalu Sejmometr i operatorem platformy ePF_API jest Fundacja ePaństwo - niezależna organizacja pozarządowa, działająca na rzecz dostępu do informacji publicznych w Polsce. Zobacz http://epf.org.pl.

Informacje, do których dostęp uzyskuje się przez ePF_API są informacjami publicznymi w rozumieniu ustawy o dostępie do informacji publicznej. Są to również akty normatywne lub ich urzędowe projekty, urzędowe dokumenty, materiały, znaki i symbole, o których mowa w art. 4 ustawy o prawie autorskim i prawach pokrewnych. Jako takie zaś nie są przedmiotem prawa autorskiego.

Fundacja ePaństwo stara się strukturalizować, wzbogacać oraz łączyć informacje, które pozyskuje w ramach ponownego wykorzystywania informacji z sektora publicznego. W takim przypadku może powstać chroniony prawem autorskim utwór. Starania Fundacji dotyczace strukturalizacji danych mogą też powodować, że korzystający z ePF_API będą korzystali z bazy danych, o której mowa w ustawie o ochronie baz danych.

Fundacja ePaństwo niniejszym udziela "wolnej licencji" na udostępniane w ramach ePF_API utwory i bazy danych, do których przysługują jej autorskie prawa majątkowe oraz prawa pokrewne, a jedynym warunkiem takiej licencji - w przypadku tworzenia aplikacji wykorzystujących dane udostępniane przez Fundację - jest umieszczenie informacji o pochodzeniu danych wraz z linkiem do serwisu Sejmometr.pl.
