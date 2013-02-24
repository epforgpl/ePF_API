<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Bip_Instytucja.
 *
 * Aliasy:
 *   bip_instytucje
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('bip_instytucje');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Bip_Instytucja
 *
 * @see ep_Bip_Instytucja::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Bip_Instytucja extends ep_Object{

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

	public $_aliases = array( 'bip_instytucje' );

	/**
	 * @return string
	 */
	public function __toString(){
		return (string) $this->get_nazwa();
	}
}
