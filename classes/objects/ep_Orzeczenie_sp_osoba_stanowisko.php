<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Orzeczenie_sp_osoba_stanowisko.
 *
 * Aliasy:
 *   sp_ludzie_stanowiska
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sp_ludzie_stanowiska');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Orzeczenie_sp_osoba_stanowisko
 *
 * @see ep_Orzeczenie_sp_osoba_stanowisko::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Orzeczenie_sp_osoba_stanowisko extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			//FIXME missing definition
		));
		return $result;
	}

	public $_aliases = array( 'sp_ludzie_stanowiska' );

	/**
	 * @var ep_Orzeczenie_sp
	 */
	protected $_orzeczenie_sp = null;

	/**
	 * @var ep_SP_Osoba
	 */
	protected $_orzeczenie_sp_osoba = null;

	/**
	 * @var ep_SP_Stanowisko
	 */
	protected $_orzeczenie_sp_stanowisko = null;

	/**
	 * @return ep_SP_Orzeczenie
	 */
	public function orzeczenie_sp(){
		if( !$this->_orzeczenie_sp ) {
			$this->_orzeczenie_sp = new ep_SP_Orzeczenie( $this->get_orzeczenie_sp_id() );
		}
		return $this->_orzeczenie_sp;
	}

	/**
	 * @return ep_SP_Osoba
	 */
	public function orzeczenie_sp_osoba(){
		if( !$this->_orzeczenie_sp_osoba ) {
			$this->_orzeczenie_sp_osoba = new ep_SP_Osoba( $this->get_orzeczenie_sp_osoba_id() );
		}
		return $this->_orzeczenie_sp_osoba;
	}

	/**
	 * @return ep_SP_Stanowisko
	 */
	public function orzeczenie_sp_stanowisko(){
		if( !$this->_orzeczenie_sp_stanowisko ) {
			$this->_orzeczenie_sp_stanowisko = new ep_SP_Stanowisko( $this->get_orzeczenie_sp_stanowisko_id() );
		}
		return $this->_orzeczenie_sp_stanowisko;
	}
}
