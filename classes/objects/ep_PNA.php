<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_PNA.
 *
 * Aliasy:
 *   kody_pocztowe_miejsca
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('kody_pocztowe_miejsca');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_PNA
 *
 * @see ep_PNA::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_PNA extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'gmina_id' => ep_Object::TYPE_STRING,
			'kod' => ep_Object::TYPE_STRING,
			'kod_int' => ep_Object::TYPE_INT,
			'miejscowosc' => ep_Object::TYPE_STRING,
			'powiat_id' => ep_Object::TYPE_STRING,
			'wojewodztwo_id' => ep_Object::TYPE_INT,
			'numery' => ep_Object::TYPE_STRING,
			'ulica' => ep_Object::TYPE_STRING,
			'wojewodztwo' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('kody_pocztowe_miejsca');

	/**
	 * @var ep_Gmina
	 */
	protected $_gmina = null;

	/**
	 * @var ep_Powiat
	 */
	protected $_powiat = null;

	/**
	 * @var ep_Wojewodztwo
	 */
	protected $_wojewodztwo = null;

	/**
	 * @return ep_Gmina
	 */
	public function gmina(){
		if( !$this->_gmina ) {
			$this->_gmina = new ep_Gmina( $this->get_gmina_id() );
		}
		return $this->_gmina;
	}

	/**
	 * @return ep_Powiat
	 */
	public function powiat(){
		if( !$this->_powiat ) {
			$this->_powiat = new ep_Powiat( $this->get_powiat_id() );
		}
		return $this->_powiat;
	}

	/**
	 * @return ep_Wojewodztwo
	 */
	public function wojewodztwo(){
		if( !$this->_wojewodztwo ) {
			$this->_wojewodztwo = new ep_Wojewodztwo( $this->get_wojewodztwo_id() );
		}
		return $this->_wojewodztwo;
	}
}
