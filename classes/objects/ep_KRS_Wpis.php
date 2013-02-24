<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_KRS_Wpis.
 *
 * Aliasy:
 *   krs
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('krs');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_KRS_Wpis
 *
 * @see ep_KRS_Wpis::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_KRS_Wpis extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			//FIXME missing definition
		));
		return $result;
	}

	public $_aliases = array('krs');
	public $_field_init_lookup = 'krs';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
