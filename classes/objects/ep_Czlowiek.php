<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Czlowiek.
 *
 * Aliasy:
 *   ludzie
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('ludzie');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Czlowiek
 *
 * @see ep_Czlowiek::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Czlowiek extends ep_Object{

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

	public $_aliases = array('ludzie');
	public $_field_init_lookup = 'nazwa';
	private $_stanowiska = false;

	public function stanowiska(){
		if( !$this->_stanowiska ) {

			$this->_stanowiska = new ep_Dataset('stanowiska');
			$this->_stanowiska->init_where('ludzie.id', '=', $this->id);
		}
		return $this->_stanowiska;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
