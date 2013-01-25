<?php
/*
 * PONIŻEJ WKLEJ SWOJE KLUCZE API. ABY JE UZYSKAĆ, MUSISZ ZAREJETROWAĆ KONTO NA PORTALU http://sejmometr.pl
 * WIĘCEJ INFORMACJI NA http://sejmometr.pl/api
 */

// define('eP_API_KEY', '');
// define('eP_API_SECRET', '');

/*
 * Jeżeli stałe eP_API_KEY i eP_API_SECRET definiujesz w innym pliku - pamiętaj, aby powyższe definicje były wykomentowane
 */

require_once('classes/ep_Autoloader.php');
$autoloader = new ep_Autoloader();
$autoloader->register();
require_once('classes/ep_API.php');
