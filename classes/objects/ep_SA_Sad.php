<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SA_Sad.
 *
 * Aliasy:
 *   sa_sady
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sa_sady');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SA_Sad
 *
 * @see ep_SA_Sad::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SA_Sad extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
			'dopelniacz' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sa_sady');
	public $_field_init_lookup = 'nazwa';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
