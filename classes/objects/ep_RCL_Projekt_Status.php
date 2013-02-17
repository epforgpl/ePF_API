<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_RCL_Projekt_Status.
 *
 * Aliasy:
 *   rcl_projekty_statusy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('rcl_projekty_statusy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_RCL_Projekt_Status
 *
 * @see ep_RCL_Projekt_Status::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_RCL_Projekt_Status extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'tytul' => ep_Object::TYPE_STRING,
			//FIXME possibly incomplete definition
		));
		return $result;
	}

	public $_aliases = array('rcl_projekty_statusy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
