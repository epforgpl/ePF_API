<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Ustawa.
 *
 * Aliasy:
 *   ustawy
 *   prawo_typy
 *   isap_pliki
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('ustawy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Ustawa
 *
 * @see ep_Ustawa::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Ustawa extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'dokument_id' => ep_Object::TYPE_STRING,
			'isip_plik_typ_id' => ep_Object::TYPE_STRING,
			'dzial_id' => ep_Object::TYPE_STRING,
			'autor_id' => ep_Object::TYPE_STRING,
			'data_publikacji' => ep_Object::TYPE_STRING,
			'data_wejscia_w_zycie' => ep_Object::TYPE_STRING,
			'data_wydania' => ep_Object::TYPE_STRING,
			'isap_data_uchylenia' => ep_Object::TYPE_STRING,
			'isap_data_wygasniecia' => ep_Object::TYPE_STRING,
			'isap_id' => ep_Object::TYPE_STRING,
			'isap_uwagi_str' => ep_Object::TYPE_STRING,
			'status_id' => ep_Object::TYPE_STRING,
			'sygnatura' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			'typ_nazwa' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'tytul_skrocony' => ep_Object::TYPE_STRING,
			'zrodlo' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('ustawy','prawo_typy','isap_pliki');
	// public $_field_init_lookup = 'tytul';
	private $_prawo = false;
	private $_projekty_zmian = false;

	public function set_ep_Prawo($data){
		$this->_prawo = new ep_Prawo($data);
	}

	public function projekty_zmian(){
		if( !$this->_projekty_zmian ) {
			$this->_projekty_zmian = new ep_Dataset('legislacja_projekty_ustaw');
			$this->_projekty_zmian->init_where('ustawy.id', '=', $this->data['id']);
		}

		return $this->_projekty_zmian;
	}

	public function prawo(){
		return $this->_prawo;
	}

	function parse_data( $data ){
		parent::parse_data($data);

		$fields = array('autor_id', 'data_publikacji', 'data_wejscia_w_zycie', 'data_wydania', 'isap_data_uchylenia', 'isap_data_wygasniecia', 'isap_id', 'isap_uwagi_str', 'status_id', 'sygnatura', 'typ_id', 'typ_nazwa', 'tytul', 'tytul_skrocony', 'zrodlo');
		foreach( $fields as $f ) {
			$this->data[$f] = $this->prawo()->data[$f];
		}
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
