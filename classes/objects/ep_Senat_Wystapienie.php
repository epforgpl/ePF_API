<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Senat_Wystapienie.
 *
 * Aliasy:
 *   senat_wystapienia
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('senat_wystapienia');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Senat_Wystapienie
 *
 * @see ep_Senat_Wystapienie::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Senat_Wystapienie extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'dzien_id' => ep_Object::TYPE_STRING,
			'ilosc_slow' => ep_Object::TYPE_STRING,
			'marszalek' => ep_Object::TYPE_STRING,
			'mowca_funkcja_id' => ep_Object::TYPE_STRING,
			'mowca_id' => ep_Object::TYPE_STRING,
			'posiedzenie_id' => ep_Object::TYPE_STRING,
			'senator' => ep_Object::TYPE_STRING,
			'skrot' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('senat_wystapienia');
	private $_mowca = false;
	private $_stanowisko = false;
	private $_posiedzenie = false;
	private $_debata = false;
	private $_punkt = false;

	public function __construct( $data, $complex = true) {
		parent::__construct( $data, $complex );
		$this->data['tytul'] = strip_tags( 'Wystąpienie '.$this->mowca()->data['nazwa'] );//FIXME Trying to get property of non-object
	}

	/*
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
	*/

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
