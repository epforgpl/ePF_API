<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Interpelacja.
 *
 * Aliasy:
 *   sejm_interpelacje
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('sejm_interpelacje')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 *
 * Dostępne dodatkowe warstwy danych:
 * dane
 *
 * Przykład:
 * <code>
 * 	 $data = $object->load_layer('dane');
 * </code>
 *
 * @example objects/ep_Sejm_Interpelacja
 *
 * @see ep_Sejm_Interpelacja::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_adresaci_str()
 * @method string get_data_ogloszenia()
 * @method string get_data_status()
 * @method string get_data_wplywu()
 * @method string get_liczba_poslow()
 * @method string get_mowca_id()
 * @method string get_numer()
 * @method string get_ogloszenie_posiedzenie_id()
 * @method string get_poslowie_str()
 * @method string get_skrot()
 * @method string get_typ_id()
 * @method string get_typ_nazwa()
 * @method string get_tytul()
 * @method string get_tytul_skrocony()
 */
class ep_Sejm_Interpelacja extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'adresaci_str' => ep_Object::TYPE_STRING,
			'data_ogloszenia' => ep_Object::TYPE_STRING,
			'data_status' => ep_Object::TYPE_STRING,
			'data_wplywu' => ep_Object::TYPE_STRING,
			'liczba_poslow' => ep_Object::TYPE_STRING,
			'mowca_id' => ep_Object::TYPE_STRING,
			'numer' => ep_Object::TYPE_STRING,
			'ogloszenie_posiedzenie_id' => ep_Object::TYPE_STRING,
			'poslowie_str' => ep_Object::TYPE_STRING,
			'skrot' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			'typ_nazwa' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'tytul_skrocony' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('sejm_interpelacje');


	/**
	 * @return string
	 */
	public function getDate(){
		return (string) $this->data['data_ogloszenia'];
	}
}
