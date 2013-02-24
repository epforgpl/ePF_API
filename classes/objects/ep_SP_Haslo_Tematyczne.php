<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SP_Haslo_Tematyczne.
 *
 * Aliasy:
 *   sp_orzeczenia_hasla_tematyczne
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sp_orzeczenia_hasla_tematyczne');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SP_Haslo_Tematyczne
 *
 * @see ep_SP_Haslo_Tematyczne::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SP_Haslo_Tematyczne extends ep_Object{

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

	public $_aliases = array( 'sp_orzeczenia_hasla_tematyczne' );

	public $_field_init_lookup = 'nazwa';

	/**
	 * @var ep_Dataset
	 */
	protected $_orzeczenia_sp_hasla = null;

	/**
	 * @return string
	 */
	public function __toString(){
		return (string) $this->get_nazwa();
	}

	/**
	 * @return ep_Dataset
	 */
	public function orzeczenia_sp_hasla(){
		if( !$this->_orzeczenia_sp_hasla ) {
			$this->_orzeczenia_sp_hasla = new ep_Dataset( 'sp_orzeczenia_hasla' );
			$this->_orzeczenia_sp_hasla->init_where( 'orzeczenie_sp_haslo_tematyczne_id', '=', $this->id );
		}
		return $this->_orzeczenia_sp_hasla;
	}
}
