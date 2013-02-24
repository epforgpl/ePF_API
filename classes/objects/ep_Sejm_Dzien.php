<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Dzien.
 *
 * Aliasy:
 *   sejm_posiedzenia_dni
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_posiedzenia_dni');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Dzien
 *
 * @see ep_Sejm_Dzien::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Dzien extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data' => ep_Object::TYPE_STRING,
			'dlugosc' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'posiedzenie_id' => ep_Object::TYPE_STRING,
			'start_time' => ep_Object::TYPE_STRING,
			'stop_time' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_posiedzenia_dni');
	private $_posiedzenie = false;
	private $_debaty = false;

	public function __construct( $data, $complex = true ){
		parent::__construct( $data, $complex );
		$this->data['tytul'] = strip_tags( sm_data_slowna( $this->data['data'] ).', '.sm_dzien_slowny( $this->data['data'] ) );
	}

	public function set_ep_sejm_posiedzenia($data){
		$this->_posiedzenie = new ep_Sejm_Posiedzenie( $data );
	}

	public function posiedzenie(){
		return $this->_posiedzenie;
	}

	public function debaty(){
		if( !$this->_debaty ) {
			$this->_debaty = new ep_Dataset('sejm_debaty');
			$this->_debaty->init_where('dzien_id', '=', $this->data['id'])->order_by('kolejnosc', 'ASC')->set_limit(1000);
		}

		return $this->_debaty;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
