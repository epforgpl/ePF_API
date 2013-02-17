<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Posel_Glos.
 *
 * Aliasy:
 *   poslowie_glosy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('poslowie_glosy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Posel_Glos
 *
 * @see ep_Posel_Glos::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Posel_Glos extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'bunt' => ep_Object::TYPE_STRING,
			'glosowanie_id' => ep_Object::TYPE_STRING,
			'glos_id' => ep_Object::TYPE_STRING,
			'klub_id' => ep_Object::TYPE_STRING,
			'posel_id' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('poslowie_glosy');
	private $_glosowanie = false;

	public function set_ep_sejm_glosowania($data){
		$this->_glosowanie = new ep_Sejm_Glosowanie($data);
	}

	public function glosowanie(){
		return $this->_glosowanie;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
