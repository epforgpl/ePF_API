<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Glosowanie.
 *
 * Aliasy:
 *   sejm_glosowania
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_glosowania');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Glosowanie
 *
 * @see ep_Sejm_Glosowanie::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Glosowanie extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'czas' => ep_Object::TYPE_STRING,
			'debata_id' => ep_Object::TYPE_STRING,
			'dzien_id' => ep_Object::TYPE_STRING,
			'g' => ep_Object::TYPE_STRING,
			'l' => ep_Object::TYPE_STRING,
			'n' => ep_Object::TYPE_STRING,
			'numer' => ep_Object::TYPE_STRING,
			'p' => ep_Object::TYPE_STRING,
			'posiedzenie_id' => ep_Object::TYPE_STRING,
			'punkt_id' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'w' => ep_Object::TYPE_STRING,
			'wb' => ep_Object::TYPE_STRING,
			'wynik_id' => ep_Object::TYPE_STRING,
			'wystapienie_id' => ep_Object::TYPE_STRING,
			'z' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_glosowania');
	public $_field_init_lookup = 'numer';

	private $_glosy = false;
	private $_posiedzenie = false;
	private $_dzien = false;
	private $_debata = false;
	private $_wystapienie = false;

	public function posiedzenie(){
		if( !$this->_posiedzenie ) {
			$this->_posiedzenie = new ep_Sejm_Posiedzenie( $this->data['posiedzenie_id'] );
		}

		return $this->_posiedzenie;
	}

	public function dzien(){
		if( !$this->_dzien ) {
			$this->_dzien = new ep_Sejm_Dzien( $this->data['dzien_id'] );
		}

		return $this->_dzien;
	}

	public function debata(){
		if( !$this->_debata ) {
			$this->_debata = new ep_Sejm_Posiedzenie_Debata( $this->data['debata_id'] );
		}

		return $this->_debata;
	}

	public function wystapienie(){
		if( !$this->_wystapienie ) {
			$this->_wystapienie = new ep_Sejm_Wystapienie( $this->data['wystapienie_id'] );
		}

		return $this->_wystapienie;
	}

	public function kluby(){
		if( !$this->_kluby ) {
			$this->_kluby = new ep_Dataset('sejm_kluby');
			//$this->_kluby->init_where('');
			$this->_kluby->init_layer('sejm_glosowania_glosy')->init_where('sejm_glosowania_glosy.glosowanie_id', '=', $this->get_id());
		}

		return $this->_kluby;
	}

	public function glosy(){
		if( !$this->_glosy ) {
			$this->_glosy = new ep_Dataset('sejm_glosowania_glosy_wyniki');
			$this->_glosy->init_where('glosowanie_id', '=', $this->data['id'])->order_by('poslowie.nazwa_odwrocona', 'ASC');
		}
		return $this->_glosy;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
