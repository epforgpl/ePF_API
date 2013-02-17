<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SP_Sad.
 *
 * Aliasy:
 *   sady_sp
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sady_sp');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SP_Sad
 *
 * @see ep_SP_Sad::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SP_Sad extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
			'dopelniacz' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array( 'sady_sp' );

	public $_field_init_lookup = 'nazwa';

	/**
	 * @var ep_Dataset
	 */
	protected $_orzeczenia_sp = null;

	/**
	 * @return string
	 */
	//public function get_url(){
	//	return (string) $this->data['url'];
	//}

	/**
	 * @return string
	 */
	public function __toString(){
		return (string) $this->get_nazwa();
	}

	/**
	 * @return ep_Dataset
	 */
	public function orzeczenia_sp(){
		if( !$this->_orzeczenia_sp ) {
			$this->_orzeczenia_sp = new ep_Dataset( 'sp_orzeczenia' );
			$this->_orzeczenia_sp->init_where( 'sad_sp_id', '=', $this->id );
		}
		return $this->_orzeczenia_sp;
	}
}
