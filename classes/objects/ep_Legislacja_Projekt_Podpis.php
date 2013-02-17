<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Legislacja_Projekt_Podpis.
 *
 * Aliasy:
 *   legislacja_projekty-podpisy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('legislacja_projekty-podpisy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Legislacja_Projekt_Podpis
 *
 * @see ep_Legislacja_Projekt_Podpis::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Legislacja_Projekt_Podpis extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'klub_id' => ep_Object::TYPE_STRING,
			'posel_id' => ep_Object::TYPE_STRING,
			'projekt_id' => ep_Object::TYPE_STRING,
			//FIXME possibly incomplete definition
		));
		return $result;
	}

	public $_aliases = array('legislacja_projekty-podpisy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
