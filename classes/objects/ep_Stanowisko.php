<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Stanowisko.
 *
 * Aliasy:
 *   stanowiska
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('stanowiska');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Stanowisko
 *
 * @see ep_Stanowisko::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Stanowisko extends ep_Object{

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

	public $_aliases = array('stanowiska');
	public $_field_init_lookup = 'nazwa';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
