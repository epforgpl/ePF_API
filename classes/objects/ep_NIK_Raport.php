<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_NIK_Raport.
 *
 * Aliasy:
 *   nik_raporty
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('nik_raporty');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_NIK_Raport
 *
 * @see ep_NIK_Raport::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_NIK_Raport extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data_moderacji' => ep_Object::TYPE_STRING,
			'data_publikacji' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'nik_id' => ep_Object::TYPE_STRING,
			'numer' => ep_Object::TYPE_STRING,
			'pdf_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('nik_raporty');
	public $_field_init_lookup = 'numer';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
