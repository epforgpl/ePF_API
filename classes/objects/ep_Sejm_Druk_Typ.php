<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Druk_Typ.
 *
 * Aliasy:
 *   sejm_druki_typy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_druki_typy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Druk_Typ
 *
 * @see ep_Sejm_Druk_Typ::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Druk_Typ extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'druk_typ_nazwa' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_druki_typy');
	public $_field_init_lookup = 'nazwa';
	private $_druki = false;

	public function druki(){
		if( !$this->_druki ) {

			$this->_druki = new ep_Dataset('sejm_druki');
			$this->_druki->init_where('sejm_druki.typ_id', '=', $this->id);
		}
		return $this->_druki;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
