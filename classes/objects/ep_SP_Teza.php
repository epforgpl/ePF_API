<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SP_Teza.
 *
 * Aliasy:
 *   sp_tezy
 *   sp_orzeczenia
 *   sp_sady
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sp_tezy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SP_Teza
 *
 * @see ep_SP_Teza::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SP_Teza extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data' => ep_Object::TYPE_STRING,
			'sad_id' => ep_Object::TYPE_STRING,
			'teza' => ep_Object::TYPE_STRING,
			//FIXME possibly incomplete definition
		));
		return $result;
	}

	public $_aliases = array('sp_tezy','sp_orzeczenia','sp_sady');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
