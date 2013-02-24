<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Powiat.
 *
 * Aliasy:
 *   powiaty
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('powiaty');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Powiat
 *
 * @see ep_Powiat::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Powiat extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
			'sejm_okreg_id' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('powiaty');
	public $_field_init_lookup = 'nazwa';

	/**
	 * @var ep_Wojewodztwo
	 */
	private $_wojewodztwo = null;

	/**
	 * @var ep_Area
	 */
	private $_obszar = null;

	public function __toString(){
		return $this->get_nazwa();
	}

	/**
	 * @return ep_Wojewodztwo
	 */
	public function wojewodztwo(){
		return $this->_wojewodztwo;
	}

	/**
	 * @param array|ep_Wojewodztwo $data
	 */
	public function set_ep_wojewodztwo( $data ){
		if( $data instanceof ep_Wojewodztwo ){
			$this->_wojewodztwo = $data;
		} else {
			$this->_wojewodztwo = new ep_Wojewodztwo( $data, false );
		}
		return $this;
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
