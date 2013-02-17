<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SA_Sedzia.
 *
 * Aliasy:
 *   sa_sedziowie
 *   sa_sedziowie_orzeczenia
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sa_sedziowie');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SA_Sedzia
 *
 * @see ep_SA_Sedzia::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SA_Sedzia extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
			'orzeczenie_id' => ep_Object::TYPE_STRING,
			'stanowisko_id' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sa_sedziowie', 'sa_sedziowie_orzeczenia');
	public $_field_init_lookup = 'nazwa';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
