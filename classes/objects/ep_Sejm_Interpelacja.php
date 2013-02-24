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
 *   $dataset = new ep_Dataset('sejm_interpelacje');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Interpelacja
 *
 * @see ep_Sejm_Interpelacja::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
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

	public $_aliases = array('sejm_interpelacje');
	public $_field_init_lookup = 'numer';

	private $_tablica = false;
	private $_poslowie = false;

	public function poslowie(){
		if( $this->_poslowie===false ) {
			$_poslowie = new ep_Dataset('poslowie');
			$_poslowie->init_where('sejm_interpelacje.id', '=', $this->data['id']);
			$this->_poslowie = $_poslowie->find_all();
		}
		return $this->_poslowie;
	}

	public function tablica(){
		if( $this->_tablica===false ) {
			$this->_tablica = new ep_Dataset('sejm_interpelacje_pisma');
			$this->_tablica->init_where('interpelacja_id', '=', $this->data['id']);
		}
		return $this->_tablica;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
