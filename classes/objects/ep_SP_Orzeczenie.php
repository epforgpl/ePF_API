<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SP_Orzeczenie.
 *
 * Aliasy:
 *   sp_orzeczenia
 *   sady_sp
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('sp_orzeczenia')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 *
 * Dostępne dodatkowe warstwy danych:
 * bloki
 *
 * Przykład:
 * <code>
 * 	 $data = $object->load_layer('bloki');
 * </code>
 
 * @example objects/ep_SP_Orzeczenie
 *
 * @see ep_SP_Orzeczenie::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method int get_akcept()
 * @method string get_data()
 * @method string get_hasla_tematyczne()
 * @method string get_podstawa_prawna()
 * @method int get_sad_sp_id()
 * @method string get_sad()
 * @method string get_str_ident()
 * @method string get_sygnatura()
 * @method string get_teza()
 * @method string get_typ()
 * @method int get_typ_id()
 * @method string get_wydzial()
 * @method string get_dopelniacz()
 */
class ep_SP_Orzeczenie extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'akcept' => ep_Object::TYPE_INT,
			'data' => ep_Object::TYPE_STRING,
			'hasla_tematyczne' => ep_Object::TYPE_STRING,
			'podstawa_prawna' => ep_Object::TYPE_STRING,
			'sad_sp_id' => ep_Object::TYPE_INT,
			'sad' => ep_Object::TYPE_STRING,
			'str_ident' => ep_Object::TYPE_STRING,
			'sygnatura' => ep_Object::TYPE_STRING,
			'teza' => ep_Object::TYPE_STRING,
			'typ' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_INT,
			'wydzial' => ep_Object::TYPE_STRING,
			'dopelniacz' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array( 'sp_orzeczenia', 'sady_sp' );

	/**
	 * @return string
	 */
	public function __toString(){
		return (string) $this->get_sygnatura();
	}
	
	/**
	 * @return string
	 */
	public function getDate(){
		return (string) $this->data['data'];
	}
}
