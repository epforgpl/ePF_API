<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Wojewodztwo.
 *
 * Aliasy:
 *   wojewodztwa
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('wojewodztwa');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Wojewodztwo
 *
 * @see ep_Wojewodztwo::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Wojewodztwo extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('wojewodztwa');
	public $_field_init_lookup = 'nazwa';

	/**
	 * @var ep_Area
	 */
	private $_obszar = null;

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}

	/**
	 * @return ep_Area
	 */
	public function obszar(){
		if( $this->_obszar === null ){
			$this->_obszar = ep_Area::init()->set_raw_data( ep_Api::init()->call( get_class($this) . '/obszar', array( 'id' => $this->id ) ) );
		}
		return $this->_obszar;
	}
}
