<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SA_Orzeczenie_Wynik.
 *
 * Aliasy:
 *   sa_orzeczenia_wyniki
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sa_orzeczenia_wyniki');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SA_Orzeczenie_Wynik
 *
 * @see ep_SA_Orzeczenie_Wynik::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SA_Orzeczenie_Wynik extends ep_Object{

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

	public $_aliases = array('sa_orzeczenia_wyniki');
	public $_field_init_lookup = 'nazwa';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
