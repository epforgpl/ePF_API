<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SP_Haslo.
 *
 * Aliasy:
 *   sp_orzeczenia_hasla
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sp_orzeczenia_hasla');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SP_Haslo
 *
 * @see ep_SP_Haslo::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SP_Haslo extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'orzeczenie_sp_haslo_tematyczne_id' => ep_Object::TYPE_INT,
			'orzeczenie_sp_id' => ep_Object::TYPE_INT,
		));
		return $result;
	}

	public $_aliases = array( 'sp_orzeczenia_hasla' );

	/**
	 * @var ep_SP_Haslo_Tematyczne
	 */
	protected $_orzeczenie_sp_haslo_tematyczne = null;

	/**
	 * @var ep_Orzeczenie_sp
	 */
	protected $_orzeczenie_sp = null;

	/**
	 * @return ep_SP_Haslo_Tematyczne
	 */
	public function orzeczenie_sp_haslo_tematyczne(){
		if( !$this->_orzeczenie_sp_haslo_tematyczne ) {
			$this->_orzeczenie_sp_haslo_tematyczne = new ep_SP_Haslo_Tematyczne( $this->get_orzeczenie_sp_haslo_tematyczne_id() );
		}
		return $this->_orzeczenie_sp_haslo_tematyczne;
	}

	/**
	 * @return ep_SP_Orzeczenie
	 */
	public function orzeczenie_sp(){
		if( !$this->_orzeczenie_sp ) {
			$this->_orzeczenie_sp = new ep_SP_Orzeczenie( $this->get_orzeczenie_sp_id() );
		}
		return $this->_orzeczenie_sp;
	}
}
