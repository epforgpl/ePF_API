<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SA_Skarzony_Organ.
 *
 * Aliasy:
 *   sa_skarzone_organy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sa_skarzone_organy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SA_Skarzony_Organ
 *
 * @see ep_SA_Skarzony_Organ::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SA_Skarzony_Organ extends ep_Object{

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

	public $_aliases = array('sa_skarzone_organy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
