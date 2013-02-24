<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Posiedzenie.
 *
 * Aliasy:
 *   sejm_posiedzenia
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_posiedzenia');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Posiedzenie
 *
 * @see ep_Sejm_Posiedzenie::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Posiedzenie extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data_start' => ep_Object::TYPE_STRING,
			'data_stop' => ep_Object::TYPE_STRING,
			'data_str' => ep_Object::TYPE_STRING,
			'img' => ep_Object::TYPE_STRING,
			'informacja_marszalka_id' => ep_Object::TYPE_STRING,
			'komunikat_id' => ep_Object::TYPE_STRING,
			'liczba_glosowan' => ep_Object::TYPE_STRING,
			'liczba_punktow' => ep_Object::TYPE_STRING,
			'opis' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'zapowiedz' => ep_Object::TYPE_STRING,
			'stats' => ep_Object::TYPE_STRING,
			'numer' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_posiedzenia');
	public $_field_init_lookup = 'tytul';
	private $_dni = false;
	private $_punkty = false;
	private $_wystapienia = false;
	private $_glosowania = false;
	private $_poslowie = false;

	public function __construct( $data, $complex = true ){
		parent::__construct( $data, $complex );
		$this->data['stats'] = json_decode( $this->data['stats_json'], true );//FIXME Undefined index: stats_json
		unset( $this->data['stats_json'] );
		$this->data['numer'] = (int) $this->data['tytul'];
		$this->data['tytul'] = 'Posiedzenie Sejmu nr '.$this->data['tytul'];
	}

	public function dni(){
		if( !$this->_dni ) {
			$this->_dni = new ep_Dataset('sejm_posiedzenia_dni');
			$this->_dni->init_where('posiedzenie_id', '=', $this->id)->order_by('sejm_posiedzenia_dni.data', 'ASC');
		}

		return $this->_dni;
	}

	public function poslowie(){
		if( !$this->_poslowie ) {
			$this->_poslowie = new ep_Dataset('poslowie');
			$this->_poslowie->init_layer('sejm_posiedzenia_poslowie')->init_where('sejm_posiedzenia_poslowie.posiedzenie_id', '=', $this->data['id']);
		}

		return $this->_poslowie;
	}

	public function punkty(){
		if( !$this->_punkty ) {
			$this->_punkty = new ep_Dataset('sejm_posiedzenia_punkty');
			$this->_punkty->init_where('sejm_posiedzenia_punkty.posiedzenie_id', '=', $this->id)->order_by('sejm_posiedzenia_punkty.kolejnosc', 'ASC')->set_limit( 1000 );
		}

		return $this->_punkty;
	}

	public function wystapienia(){
		if( !$this->_wystapienia ) {
			$this->_wystapienia = new ep_Dataset('sejm_wystapienia');
			$this->_wystapienia->init_where('sejm_wystapienia.posiedzenie_id', '=', $this->id)->order_by('sejm_wystapienia.kolejnosc', 'ASC');
		}

		return $this->_wystapienia;
	}

	public function glosowania(){
		if( !$this->_glosowania ) {
			$this->_glosowania = new ep_Dataset('sejm_glosowania');
			$this->_glosowania->init_where('sejm_glosowania.posiedzenie_id', '=', $this->id)->order_by('sejm_glosowania.czas', 'ASC')->set_limit( 1000 );
		}

		return $this->_glosowania;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
