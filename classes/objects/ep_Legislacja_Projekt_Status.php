<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Legislacja_Projekt_Status.
 *
 * Aliasy:
 *   legislacja_projekty_statusy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('legislacja_projekty_statusy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Legislacja_Projekt_Status
 *
 * @see ep_Legislacja_Projekt_Status::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Legislacja_Projekt_Status extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'kolejnosc' => ep_Object::TYPE_STRING,
			'nazwa' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			//FIXME possibly incomplete definition
		));
		return $result;
	}

	public $_aliases = array('legislacja_projekty_statusy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
