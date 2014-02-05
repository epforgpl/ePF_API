<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SN_Orzeczenie.
 *
 * Aliasy:
 *   sn_orzeczenia
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('sn_orzeczenia')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 *
 * @example objects/ep_SN_Orzeczenie
 *
 * @see ep_SN_Orzeczenie::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_akcept()
 * @method string get_data()
 * @method string get_dokument_id()
 * @method string get_forma()
 * @method int get_item_id()
 * @method string get_izby_str()
 * @method string get_jednostka_str()
 * @method int get_orzeczenie_sn_forma_id()
 * @method int get_orzeczenie_sn_jednostka_id()
 * @method int get_orzeczenie_sn_sklad_id()
 * @method string get_przewodniczacy()
 * @method int get_przewodniczacy_id()
 * @method string get_sprawozdawcy_str()
 * @method string get_sygnatura()
 * @method string get_wspolsprawozdawcy_str()
 */
class ep_SN_Orzeczenie extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'akcept' => ep_Object::TYPE_STRING,
			'data' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'forma' => ep_Object::TYPE_STRING,
			'item_id' => ep_Object::TYPE_INT,
			'izby_str' => ep_Object::TYPE_STRING,
			'jednostka_str' => ep_Object::TYPE_STRING,
			'orzeczenie_sn_forma_id' => ep_Object::TYPE_INT,
			'orzeczenie_sn_jednostka_id' => ep_Object::TYPE_INT,
			'orzeczenie_sn_sklad_id' => ep_Object::TYPE_INT,
			'przewodniczacy' => ep_Object::TYPE_STRING,
			'przewodniczacy_id' => ep_Object::TYPE_INT,
			'sprawozdawcy_str' => ep_Object::TYPE_STRING,
			'sygnatura' => ep_Object::TYPE_STRING,
			'wspolsprawozdawcy_str' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array( 'sn_orzeczenia' );

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
