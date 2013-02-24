<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Klasa ep_Api - podstawowy składnik biblioteki.
 *
 * Odpowiada za wysyłanie i pobieranie danych z serwera.
 *
 * @api
 * @see ep_Api::$_version
 * @see ep_Api::$server_address
 *
 * @category   API
 * @package    ePF_API
 * @subpackage Core
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Api {

	public $_version = '0.1';
	public $server_address = 'http://ep_api.sejmometr.pl/v1/';
	private $_key = eP_API_KEY;
	private $_secret = eP_API_SECRET;

	/**
	 * @return ep_Api
	 */
	static public function init(){
		return new ep_Api();
	}

	public function call( $service, $params ){
		$service = trim( $service );

		if( !$service ){
			return false;
		}

		parse_str( http_build_query( $params ), $params );
		$params[ 'sign' ] = $this->generate_sig( $params );
		$params[ 'key' ] = $this->_key;

		$request_url = $this->server_address . $service;

		$mt = microtime(true);
		$data = '';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $request_url );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POST, 1 );
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $params ) );
		$data = curl_exec( $ch );

		$this->http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		$requestTime = microtime(true) - $mt;
		
		switch( $this->http_code ) {

			case '401': {
				throw new Exception('Brak kluczy eP_API. Zarejestruj konto na portalu http://sejmometr.pl i pobierz swoje prywatne klucze.');
				break;
			}

			case '402': {
				throw new Exception('Przekroczony limit żądań (3000 żądań na dobę).');
				break;
			}

			case '200': {
				$result = json_decode( $data, true );
				if ($result===null) {
					throw new Exception('Niepoprawna odpowiedź serwera: '.$data);
				}
				if (isset($result['performance'])) {
					$result['performance']['client_total'] = $requestTime;
				}
				return $result;
				break;
			}
			
			default: {
				throw new Exception('Błąd wewnętrzny: Nieoczekiwana odpowiedź serwera '.$this->http_code);
				break;
			}
		}

	}

	/**
	 * @param array $params
	 * @return string
	 */
	private function generate_sig( $params ){
		$str = json_encode( $params );
		$str .= $this->_secret;

		return md5( $str );
	}
}

// Helper functions

/**
 * @addtogroup helpers
 * @{
 */

if( !function_exists('sm_data_slowna') ) {

  /**
  * Helper: sm_data_slowna()
  *
  * @package    ePF_API
  * @subpackage Helpers
  * @version    0.x.x-dev
  * @since      version 0.1.0
  *
  * @ingroup    Helpers
  * @todo       move to class or separate file
  */
	function sm_data_slowna( $data ) {
		$_miesiace = array(
				1 => 'stycznia',
				2 => 'lutego',
				3 => 'marca',
				4 => 'kwietnia',
				5 => 'maja',
				6 => 'czerwca',
				7 => 'lipca',
				8 => 'sierpnia',
				9 => 'września',
				10 => 'października',
				11 => 'listopada',
				12 => 'grudnia',
		);

		$data = trim( strip_tags( $data ) );
		$parts = explode('-', $data);
		if( count($parts)!=3 ) {
			return $data;
		}

		$rok = (int) $parts[2];
		$miesiac = (int) $parts[1];
		$dzien = (int) $parts[0];

		return '<span class="_ds" value="' . $data . '">' . $rok . ' ' . $_miesiace[ $miesiac ] . ' ' . $dzien . ' r.</span>';
	}
}

if( !function_exists('sm_dzien_slowny') ) {
  /**
   * Helper: sm_dzien_slowny()
   *
   * @package    ePF_API
   * @subpackage Helpers
   * @version    0.x.x-dev
   * @since      version 0.1.0
   *
   * @ingroup    Helpers
   * @todo       move to class or separate file
   */
	function sm_dzien_slowny( $data ){
		$dni = array('Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');
		$w = (int) date('w', strtotime($data));
		$w = ($w - 1) % 7;
		return $dni[ $w ];
	}
}

/**
 * @} End of "addtogroup helpers"
 */
