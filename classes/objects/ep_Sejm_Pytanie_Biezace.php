<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Pytanie_Biezace.
 *
 * Aliasy:
 *   sejm_pytania_biezace
 *   sejm_interpelacje
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_pytania_biezace');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Pytanie_Biezace
 *
 * @see ep_Sejm_Pytanie_Biezace::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Pytanie_Biezace extends ep_Object{

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

	public $_aliases = array('sejm_pytania_biezace', 'sejm_interpelacje');

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
