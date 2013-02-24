<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Glosowanie_Typ.
 *
 * Aliasy:
 *   sejm_glosowania_typy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_glosowania_typy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Glosowanie_Typ
 *
 * @see ep_Sejm_Glosowanie_Typ::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Glosowanie_Typ extends ep_Object{

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

	public $_aliases = array('sejm_glosowania_typy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
