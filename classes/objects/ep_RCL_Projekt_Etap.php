<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_RCL_Projekt_Etap.
 *
 * Aliasy:
 *   rcl_projekty_tablice
 *   rcl_projekty_tablice_typy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('rcl_projekty_tablice');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_RCL_Projekt_Etap
 *
 * @see ep_RCL_Projekt_Etap::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_RCL_Projekt_Etap extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data' => ep_Object::TYPE_STRING,
			'data_json' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'projekt_id' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			'tablica_typ_nazwa' => ep_Object::TYPE_STRING,
			//FIXME possibly incomplete definition
		));
		return $result;
	}

	public $_aliases = array('rcl_projekty_tablice', 'rcl_projekty_tablice_typy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
