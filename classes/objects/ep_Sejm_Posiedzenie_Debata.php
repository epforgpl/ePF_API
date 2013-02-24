<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Posiedzenie_Debata.
 *
 * Aliasy:
 *   sejm_debaty
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_debaty');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Posiedzenie_Debata
 *
 * @see ep_Sejm_Posiedzenie_Debata::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Posiedzenie_Debata extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data' => ep_Object::TYPE_STRING,
			'dlugosc_int' => ep_Object::TYPE_STRING,
			'dzien_id' => ep_Object::TYPE_STRING,
			'kolejnosc' => ep_Object::TYPE_STRING,
			'liczba_glosowan' => ep_Object::TYPE_STRING,
			'liczba_wystapien' => ep_Object::TYPE_STRING,
			'posiedzenie_id' => ep_Object::TYPE_STRING,
			'promo_wystapienie_id' => ep_Object::TYPE_STRING,
			'punkt_id' => ep_Object::TYPE_STRING,
			'start_str' => ep_Object::TYPE_STRING,
			'stats_str' => ep_Object::TYPE_STRING,
			'stop_str' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'video' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_debaty');

	private $_debaty = false;
	private $_wystapienia = false;
	private $_glosowania = false;
	private $_posiedzenie = false;
	private $_dzien = false;
	private $_punkt = false;

	public function punkt(){
		if( $this->_punkt===false ) {
			$this->_punkt = new ep_Sejm_Posiedzenie_Punkt( $this->data['punkt_id'] );
		}

		return $this->_punkt;
	}

	public function wystapienia(){
		if( !$this->_wystapienia ) {
			$this->_wystapienia = new ep_Dataset('sejm_wystapienia');
			$this->_wystapienia->init_where('debata_id', '=', $this->data['id'])->order_by('kolejnosc', 'ASC');
		}
		return $this->_wystapienia;
	}

	public function glosowania(){
		if( !$this->_glosowania ) {
			$this->_glosowania = new ep_Dataset('sejm_glosowania');
			$this->_glosowania->init_where('debata_id', '=', $this->data['id'])->order_by('czas', 'ASC');
		}
		return $this->_glosowania;
	}

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

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
