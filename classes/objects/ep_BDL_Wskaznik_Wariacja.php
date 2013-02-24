<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_BDL_Wskaznik_Wariacja.
 *
 * Aliasy:
 *   bdl_wskazniki_wariacje
 *   bdl_wskazniki
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('bdl_wskazniki_wariacje');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_BDL_Wskaznik_Wariacja
 *
 * @see ep_BDL_Wskaznik_Wariacja::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_BDL_Wskaznik_Wariacja extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'podgrupa_id' => ep_Object::TYPE_INT,
			'tytul' => ep_Object::TYPE_STRING,
			'data_count' => ep_Object::TYPE_STRING,
			'fv' => ep_Object::TYPE_STRING,
			'fy' => ep_Object::TYPE_STRING,
			'jednostka_str' => ep_Object::TYPE_STRING,
			'lv' => ep_Object::TYPE_STRING,
			'ly' => ep_Object::TYPE_STRING,
			'p2' => ep_Object::TYPE_STRING,
			'p3' => ep_Object::TYPE_STRING,
			'p4' => ep_Object::TYPE_STRING,
			'p5' => ep_Object::TYPE_STRING,
			'wskaznik_id' => ep_Object::TYPE_STRING,
			'zv' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('bdl_wskazniki_wariacje', 'bdl_wskazniki');

	public $_podgrupa = null;
	public $_wojewodztwa = null;
	public $_powiaty	 = null;

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}

	/**
	 * @return ep_BDL_Podgrupa
	 */
	public function podgrupa(){
		if( !$this->_podgrupa ) {
			$this->_podgrupa = new ep_BDL_Podgrupa( $this->get_podgrupa_id() );
		}
		return $this->_podgrupa;
	}

	public function wojewodztwa(){
		if( !$this->_wojewodztwa ) {
			$this->_wojewodztwa = new ep_Dataset( 'wojewodztwa' );
			$this->_wojewodztwa->init_layer('bdl_wsk_opcje_wojewodztwa_ostatnie')->init_where('bdl_wsk_opcje_wojewodztwa_ostatnie.opcja_id', '=', $this->get_id())->set_limit(10000);
		}
		return $this->_wojewodztwa;
	}

	public function powiaty(){
		if( !$this->_powiaty ) {
			$this->_powiaty = new ep_Dataset( 'powiaty' );
			$this->_powiaty->init_layer('bdl_wsk_opcje_powiaty_ostatnie')->init_where('bdl_wsk_opcje_powiaty_ostatnie.opcja_id', '=', $this->get_id())->set_limit(10);
		}
		return $this->_powiaty;
	}

	public function gminy(){
		if( !$this->_gminy ) {
			$this->_gminy = new ep_Dataset( 'gminy' );
			$this->_gminy->init_layer('bdl_wsk_opcje_gminy_ostatnie')->init_where('bdl_wsk_opcje_gminy_ostatnie.opcja_id', '=', $this->get_id())->set_limit(10);
		}
		return $this->_gminy;
	}
}
