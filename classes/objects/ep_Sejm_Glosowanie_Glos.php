<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Glosowanie_Glos.
 *
 * Aliasy:
 *   sejm_glosowania_glosy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_glosowania_glosy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Glosowanie_Glos
 *
 * @see ep_Sejm_Glosowanie_Glos::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Glosowanie_Glos extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'color' => ep_Object::TYPE_STRING,
			'nazwa' => ep_Object::TYPE_STRING,
			'opis' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_glosowania_glosy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
