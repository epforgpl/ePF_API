<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Dezyderat.
 *
 * Aliasy:
 *   sejm_dezyderaty
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_dezyderaty');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Dezyderat
 *
 * @see ep_Sejm_Dezyderat::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Dezyderat extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_dezyderaty');
	public $_field_init_lookup = 'tytul';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
