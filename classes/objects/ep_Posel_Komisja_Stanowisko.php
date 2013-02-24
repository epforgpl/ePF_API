<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Posel_Komisja_Stanowisko.
 *
 * Aliasy:
 *   poslowie_komisje_stanowiska
 *   sejm_komisje_stanowiska
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('poslowie_komisje_stanowiska');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Posel_Komisja_Stanowisko
 *
 * @see ep_Posel_Komisja_Stanowisko::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Posel_Komisja_Stanowisko extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'aktywny' => ep_Object::TYPE_STRING,
			'data_start' => ep_Object::TYPE_STRING,
			'data_stop' => ep_Object::TYPE_STRING,
			'funkcja_id' => ep_Object::TYPE_STRING,
			'komisja_id' => ep_Object::TYPE_STRING,
			'podkomisja_id' => ep_Object::TYPE_STRING,
			'posel_id' => ep_Object::TYPE_STRING,
			'nazwa_stanowiska' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('poslowie_komisje_stanowiska', 'sejm_komisje_stanowiska');
	private $_komisja = false;
	private $_posel = false;

	public function set_ep_poslowie($data){
		$this->_posel = new ep_Posel($data);
	}
	public function posel(){
		return $this->_posel;
	}

	public function set_ep_sejm_komisje($data){
		$this->_komisja = new ep_Sejm_Komisja($data);
	}
	public function komisja(){
		return $this->_komisja;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
