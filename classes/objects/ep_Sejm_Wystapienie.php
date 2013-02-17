<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Wystapienie.
 *
 * Aliasy:
 *   sejm_wystapienia
 *   sejm_posiedzenia_dni
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_wystapienia');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Wystapienie
 *
 * @see ep_Sejm_Wystapienie::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Wystapienie extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data' => ep_Object::TYPE_STRING,
			'posiedzenie_id' => ep_Object::TYPE_STRING,
			'czlowiek_id' => ep_Object::TYPE_STRING,
			'debata_id' => ep_Object::TYPE_STRING,
			'dzien_sejmowy_id' => ep_Object::TYPE_STRING,
			'ilosc_slow' => ep_Object::TYPE_STRING,
			'klub_id' => ep_Object::TYPE_STRING,
			'kolejnosc' => ep_Object::TYPE_STRING,
			'punkt_id' => ep_Object::TYPE_STRING,
			'skrot' => ep_Object::TYPE_STRING,
			'stanowisko_id' => ep_Object::TYPE_STRING,
			'video' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_wystapienia', 'sejm_posiedzenia_dni');
	public $_field_init_lookup = 'skrot';
	private $_mowca = false;
	private $_stanowisko = false;
	private $_posiedzenie = false;
	private $_debata = false;
	private $_punkt = false;

	public function __construct( $data, $complex = true) {
		parent::__construct( $data, $complex );
		//FIXME line below: Trying to get property of non-object
		$this->data['tytul'] = strip_tags( 'Wystąpienie '.sm_data_slowna( $this->data['data'] ) ).' '.$this->mowca()->data['nazwa'];
	}

	public function posiedzenie(){
		if( !$this->_posiedzenie ) {
			$this->_posiedzenie = new ep_Sejm_Posiedzenie( $this->data['posiedzenie_id'] );
		}
		return $this->_posiedzenie;
	}

	public function debata(){
		if( !$this->_debata ) {
			$this->_debata = new ep_Sejm_Posiedzenie_Debata( $this->data['debata_id'] );
		}
		return $this->_debata;
	}

	public function punkt(){
		if( !$this->_punkt ) {
			$this->_punkt = new ep_Sejm_Posiedzenie_Punkt( $this->data['punkt_id'] );
		}
		return $this->_punkt;
	}

	public function set_ep_mowcy($data){
		$this->_mowca = new ep_Czlowiek($data);
	}

	public function mowca(){
		return $this->_mowca;
	}

	public function set_ep_stanowiska($data){
		$this->_stanowisko = new ep_Stanowisko($data);
	}

	public function stanowisko(){
		return $this->_stanowisko;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
