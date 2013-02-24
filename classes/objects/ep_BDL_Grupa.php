<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_BDL_Grupa.
 *
 * Aliasy:
 *   bdl_wskazniki_grupy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('bdl_wskazniki_grupy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_BDL_Grupa
 *
 * @see ep_BDL_Grupa::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_BDL_Grupa extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'kategoria_id' => ep_Object::TYPE_STRING,
			'liczba_podgrup' => ep_Object::TYPE_STRING,
			'okres' => ep_Object::TYPE_STRING,
			'slug' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('bdl_wskazniki_grupy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
