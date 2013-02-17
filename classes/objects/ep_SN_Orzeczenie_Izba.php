<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SN_Orzeczenie_Izba.
 *
 * Aliasy:
 *   sn_izby-orzeczenia
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sn_izby-orzeczenia');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SN_Orzeczenie_Izba
 *
 * @see ep_SN_Orzeczenie_Izba::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SN_Orzeczenie_Izba extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'orzeczenie_sn_id' => ep_Object::TYPE_INT,
			'orzeczenie_sn_izba_id' => ep_Object::TYPE_INT,
		));
		return $result;
	}

	public $_aliases = array( 'sn_izby-orzeczenia' );

	/**
	 * @var ep_SN_Orzeczenie
	 */
	protected $_orzeczenie_sn = null;

	/**
	 * @var ep_SN_Izba
	 */
	protected $_orzeczenie_sn_izba = null;

	/**
	 * @return ep_SN_Orzeczenie
	 */
	public function orzeczenie_sn(){
		if( !$this->_orzeczenie_sn ) {
			$this->_orzeczenie_sn = new ep_SN_Orzeczenie( $this->get_orzeczenie_sn_id() );
		}
		return $this->_orzeczenie_sn;
	}

	/**
	 * @return ep_SN_Izba
	 */
	public function orzeczenie_sn_izba(){
		if( !$this->_orzeczenie_sn_izba ) {
			$this->_orzeczenie_sn_izba = new ep_SN_Izba( $this->get_orzeczenie_sn_izba_id() );
		}
		return $this->_orzeczenie_sn_izba;
	}
}
