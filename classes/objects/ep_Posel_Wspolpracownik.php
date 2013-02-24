<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Posel_Wspolpracownik.
 *
 * Aliasy:
 *   poslowie_wspolpracownicy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('poslowie_wspolpracownicy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Posel_Wspolpracownik
 *
 * @see ep_Posel_Wspolpracownik::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Posel_Wspolpracownik extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
			'data' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'funkcja' => ep_Object::TYPE_STRING,
			'posel_id' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('poslowie_wspolpracownicy');
	private $_posel = false;

	public function set_ep_poslowie($data){
		$this->_posel = new ep_Posel($data);
	}

	public function posel(){
		return $this->_posel;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
