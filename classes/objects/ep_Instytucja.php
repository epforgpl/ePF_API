<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Instytucja.
 *
 * Aliasy:
 *   instytucje
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('instytucje');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Instytucja
 *
 * @see ep_Instytucja::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Instytucja extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
			'dopelniacz' => ep_Object::TYPE_STRING,
			'skrot' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('instytucje');
	public $_field_init_lookup = 'nazwa';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
