<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_RCL_Dokument.
 *
 * Aliasy:
 *   rcl_dokumenty
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('rcl_dokumenty');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_RCL_Dokument
 *
 * @see ep_RCL_Dokument::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_RCL_Dokument extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'dokument_id' => ep_Object::TYPE_STRING,
			'katalog_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('rcl_dokumenty');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
