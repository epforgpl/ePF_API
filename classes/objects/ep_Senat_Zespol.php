<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Senat_Zespol.
 *
 * Aliasy:
 *   senat_zespoly_senackie
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('senat_zespoly_senackie');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Senat_Zespol
 *
 * @see ep_Senat_Zespol::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Senat_Zespol extends ep_Object{

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

	public $_aliases = array('senat_zespoly_senackie');
	public $_field_init_lookup = 'nazwa';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
