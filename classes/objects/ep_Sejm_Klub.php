<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Klub.
 *
 * Aliasy:
 *   sejm_kluby
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_kluby');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Klub
 *
 * @see ep_Sejm_Klub::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Klub extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
			'liczba_kobiet' => ep_Object::TYPE_STRING,
			'liczba_mezczyzn' => ep_Object::TYPE_STRING,
			'liczba_poslow' => ep_Object::TYPE_STRING,
			'skrot' => ep_Object::TYPE_STRING,
			'srednia_frekfencja' => ep_Object::TYPE_STRING,
			'srednia_liczba_projektow_uchwal' => ep_Object::TYPE_STRING,
			'srednia_liczba_projektow_ustaw' => ep_Object::TYPE_STRING,
			'srednia_liczba_wnioskow' => ep_Object::TYPE_STRING,
			'srednia_liczba_wystapien' => ep_Object::TYPE_STRING,
			'srednia_poparcie_w_okregu' => ep_Object::TYPE_STRING,
			'srednia_udzial_w_obradach' => ep_Object::TYPE_STRING,
			'srednia_zbuntowanie' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_kluby');
	public $_field_init_lookup = 'nazwa';

	private $_poslowie = false;

	public function poslowie(){
		if( !$this->_poslowie ) {

			!$this->_poslowie = new ep_Dataset('poslowie');
			$this->_poslowie->init_where('klub_id', '=', $this->data['id']);
		}
		return $this->_poslowie;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
