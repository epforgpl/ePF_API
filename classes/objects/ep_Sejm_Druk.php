<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Druk.
 *
 * Aliasy:
 *   sejm_druki
 *   sejm_druki_typy
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('sejm_druki')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 * @example objects/ep_Sejm_Druk
 *
 * @see ep_Sejm_Druk::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_autorzy_str()
 * @method string get_data()
 * @method string get_dokument_id()
 * @method string get_numer()
 * @method string get_numer_int()
 * @method string get_opis()
 * @method string get_typ_id()
 * @method string get_tytul()
 * @method string get_tytul_skrocony()
 * @method string get_druk_typ_nazwa()
 */
class ep_Sejm_Druk extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'autorzy_str' => ep_Object::TYPE_STRING,
			'data' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'numer' => ep_Object::TYPE_STRING,
			'numer_int' => ep_Object::TYPE_STRING,
			'opis' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'tytul_skrocony' => ep_Object::TYPE_STRING,
			'druk_typ_nazwa' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('sejm_druki', 'sejm_druki_typy');

	/**
	 * @var array
	 */
	public $_field_init_lookup = 'numer';

	/**
	 * @return string
	 */
	public function getDate(){
		return (string) $this->data['data'];
	}
}
