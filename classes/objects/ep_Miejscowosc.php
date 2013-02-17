<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Miejscowosc.
 *
 * Aliasy:
 *   miejscowosci
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('miejscowosci');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Miejscowosc
 *
 * @see ep_Miejscowosc::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Miejscowosc extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'gmina_id' => ep_Object::TYPE_INT,
			'nazwa' => ep_Object::TYPE_STRING,
			'nazwa_gminy' => ep_Object::TYPE_STRING,
			'powiat_id' => ep_Object::TYPE_INT,
			'wojewodztwo_id' => ep_Object::TYPE_INT,
		));
		return $result;
	}

	public $_aliases = array( 'miejscowosci' );

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
	 * @return string
	 */
	public function __toString(){
		return (string) $this->get_nazwa();
	}

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
