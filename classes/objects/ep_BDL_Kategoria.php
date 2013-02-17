<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_BDL_Kategoria.
 *
 * Aliasy:
 *   bdl_wskazniki_kategorie
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('bdl_wskazniki_kategorie');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_BDL_Kategoria
 *
 * @see ep_BDL_Kategoria::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_BDL_Kategoria extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'liczba_grup' => ep_Object::TYPE_STRING,
			'okres' => ep_Object::TYPE_STRING,
			'slug' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('bdl_wskazniki_kategorie');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
