<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Wniesiony_Projekt.
 *
 * Aliasy:
 *   sejm_wniesione_projekty
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_wniesione_projekty');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Wniesiony_Projekt
 *
 * @see ep_Sejm_Wniesiony_Projekt::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Wniesiony_Projekt extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'autor_str' => ep_Object::TYPE_STRING,
			'data' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'opis' => ep_Object::TYPE_STRING,
			'opis_str' => ep_Object::TYPE_STRING,
			'projekt_id' => ep_Object::TYPE_STRING,
			'przebieg_str' => ep_Object::TYPE_STRING,
			'reprezentant_funkcja_id' => ep_Object::TYPE_STRING,
			'reprezentant_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'tytul_skrocony' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_wniesione_projekty');

	public function projekt(){
		if( $this->data['projekt_id'] ){
			return ep_Legislacja_Projekt( $this->data['projekt_id'] );
		}
		else{
			return false;
		}
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
