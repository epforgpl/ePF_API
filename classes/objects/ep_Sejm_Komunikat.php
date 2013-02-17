<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Komunikat.
 *
 * Aliasy:
 *   sejm_komunikaty
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_komunikaty');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Komunikat
 *
 * @see ep_Sejm_Komunikat::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Komunikat extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'date' => ep_Object::TYPE_STRING,
			'datetime' => ep_Object::TYPE_STRING,
			'img' => ep_Object::TYPE_STRING,
			'opis' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_komunikaty');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
