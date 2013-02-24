<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Posel_Aktywnosc.
 *
 * Aliasy:
 *   poslowie_aktywnosci
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('poslowie_aktywnosci');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Posel_Aktywnosc
 *
 * @see ep_Posel_Aktywnosc::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Posel_Aktywnosc extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data' => ep_Object::TYPE_STRING,
			'data_publikacji' => ep_Object::TYPE_STRING,
			'data_wydania' => ep_Object::TYPE_STRING,
			'debata_id' => ep_Object::TYPE_STRING,
			'i' => ep_Object::TYPE_STRING,
			'meta' => ep_Object::TYPE_STRING,
			'object_id' => ep_Object::TYPE_STRING,
			'posel_id' => ep_Object::TYPE_STRING,
			'projekt_dokument_id' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('poslowie_aktywnosci');

	/*
	 public function parse_data( $data ){
	parent::parse_data($data);
	// echo "\n";
	// echo $this->data['data_json'];
	// $this->data['meta'] = json_decode( $this->data['meta'], true );
	}
	*/

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
