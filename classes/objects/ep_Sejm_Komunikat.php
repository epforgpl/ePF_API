<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Komunikat.
 *
 * Aliasy:
 *   sejm_komunikaty
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('sejm_komunikaty')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 *
 * Dostępne dodatkowe warstwy danych:
 * content
 *
 * Przykład:
 * <code>
 * 	 $data = $object->load_layer('content');
 * </code>
 *
 * @example objects/ep_Sejm_Komunikat
 *
 * @see ep_Sejm_Komunikat::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_date()
 * @method string get_datetime()
 * @method string get_img()
 * @method string get_opis()
 * @method string get_tytul()
 */
class ep_Sejm_Komunikat extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'date' => ep_Object::TYPE_STRING,
			'datetime' => ep_Object::TYPE_STRING,
			'img' => ep_Object::TYPE_STRING,
			'opis' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('sejm_komunikaty');
	
	/**
	 * @return string
	 */
	public function getDate(){
		return $this->data['datetime'];
	}

	/**
	 * @return string
	 */
	public function getDatetime(){
		return $this->data['datetime'];
	}
}
