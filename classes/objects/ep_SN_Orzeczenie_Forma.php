<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SN_Orzeczenie_Forma.
 *
 * Aliasy:
 *   sn_orzeczenia_typy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sn_orzeczenia_typy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SN_Orzeczenie_Forma
 *
 * @see ep_SN_Orzeczenie_Forma::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SN_Orzeczenie_Forma extends ep_Object{

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

	public $_aliases = array( 'sn_orzeczenia_typy' );

	public $_field_init_lookup = 'nazwa';

	/**
	 * @var ep_Dataset
	 */
	protected $_orzeczenia_sn = null;

	/**
	 * @return string
	 */
	public function __toString(){
		return (string) $this->get_nazwa();
	}

	/**
	 * @return ep_Dataset
	 */
	public function orzeczenia_sn(){
		if( !$this->_orzeczenia_sn ) {
			$this->_orzeczenia_sn = new ep_Dataset( 'sn_orzeczenia' );
			$this->_orzeczenia_sn->init_where( 'orzeczenie_sn_forma_id', '=', $this->id );
		}
		return $this->_orzeczenia_sn;
	}
}
