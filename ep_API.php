<?php

/**
 * @file
 * ePF_API — Dane publiczne dostępne jak nigdy wcześniej
 * 
 * Dzięki ePF_API możesz programistycznie poruszać się po największej w Polsce 
 * otwartej bazie danych publicznych. Intuicyjny zestaw obiektów PHP umożliwia 
 * pobieranie danych oraz poruszanie się w sieci powiązań między nimi.
 *
 * Informacje, do których dostęp uzyskuje się przez ePF_API są informacjami 
 * publicznymi w rozumieniu ustawy o dostępie do informacji publicznej. 
 * Są to również akty normatywne lub ich urzędowe projekty, urzędowe dokumenty, 
 * materiały, znaki i symbole, o których mowa w art. 4 ustawy o prawie autorskim
 * i prawach pokrewnych. Jako takie zaś nie są przedmiotem prawa autorskiego. 
 *
 * @category   API
 * @package    ePF_API
 * @subpackage Core
 * @author     Daniel Macyszyn
 * @copyright  Copyright (c) 2012-2013 Fundacja ePaństwo
 * @link       http://epf.org.pl/projekty/epf_api
 * @license    http://sejmometr.pl/api
 * @version    0.x.x-dev
 * @link       https://github.com/epforgpl/ePF_API
 * @see        README.md
 * @since      version 0.1.0
 **/
 
/*
 * PONIŻEJ WKLEJ SWOJE KLUCZE API. ABY JE UZYSKAĆ, MUSISZ ZAREJETROWAĆ KONTO 
 * NA PORTALU http://sejmometr.pl
 * WIĘCEJ INFORMACJI NA http://sejmometr.pl/api
 */

// define('eP_API_KEY', '');
// define('eP_API_SECRET', '');

/*
 * Jeżeli stałe eP_API_KEY i eP_API_SECRET definiujesz w innym pliku - pamiętaj,
 * aby powyższe definicje były wykomentowane
 */
// include_once('config.php');

/**
 * Inicjalizacja systemu automatycznego ładowania klas.
 */
require_once('classes/ep_Autoloader.php');
$autoloader = new ep_Autoloader();
$autoloader->register();

require_once('classes/ep_API.php');
