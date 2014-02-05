<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Glosowanie.
 *
 * Aliasy:
 *   sejm_glosowania
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('sejm_glosowania')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 *
 * Dostępne dodatkowe warstwy danych:
 * wyniki
 *
 * Przykład:
 * <code>
 * 	 $data = $object->load_layer('wyniki');
 * </code>
 * 
 * @example objects/ep_Sejm_Glosowanie
 *
 * @see ep_Sejm_Glosowanie::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_czas()
 * @method string get_debata_id()
 * @method string get_dzien_id()
 * @method string get_g()
 * @method string get_l()
 * @method string get_n()
 * @method string get_numer()
 * @method string get_p()
 * @method string get_posiedzenie_id()
 * @method string get_punkt_id()
 * @method string get_typ_id()
 * @method string get_tytul()
 * @method string get_w()
 * @method string get_wb()
 * @method string get_wynik_id()
 * @method string get_wystapienie_id()
 * @method string get_z()
 */
class ep_Sejm_Glosowanie extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'czas' => ep_Object::TYPE_STRING,
			'debata_id' => ep_Object::TYPE_STRING,
			'dzien_id' => ep_Object::TYPE_STRING,
			'g' => ep_Object::TYPE_STRING,
			'l' => ep_Object::TYPE_STRING,
			'n' => ep_Object::TYPE_STRING,
			'numer' => ep_Object::TYPE_STRING,
			'p' => ep_Object::TYPE_STRING,
			'posiedzenie_id' => ep_Object::TYPE_STRING,
			'punkt_id' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'w' => ep_Object::TYPE_STRING,
			'wb' => ep_Object::TYPE_STRING,
			'wynik_id' => ep_Object::TYPE_STRING,
			'wystapienie_id' => ep_Object::TYPE_STRING,
			'z' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('sejm_glosowania');
	
	/**
	 * @return string
	 */
	public function getDate(){
		return $this->data['czas'];
	}

	/**
	 * @return string
	 */
	public function getDatetime(){
		return $this->data['czas'];
	}
}
