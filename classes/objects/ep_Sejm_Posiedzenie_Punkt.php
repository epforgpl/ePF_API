<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Posiedzenie_Punkt.
 *
 * Aliasy:
 *   sejm_posiedzenia_punkty
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sejm_posiedzenia_punkty');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Sejm_Posiedzenie_Punkt
 *
 * @see ep_Sejm_Posiedzenie_Punkt::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Sejm_Posiedzenie_Punkt extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'kolejnosc' => ep_Object::TYPE_STRING,
			'liczba_debat' => ep_Object::TYPE_STRING,
			'liczba_glosowan' => ep_Object::TYPE_STRING,
			'liczba_slow' => ep_Object::TYPE_STRING,
			'liczba_wystapien' => ep_Object::TYPE_STRING,
			'numer' => ep_Object::TYPE_STRING,
			'numer_int' => ep_Object::TYPE_STRING,
			'posiedzenie_id' => ep_Object::TYPE_STRING,
			'promo_wystapienie_id' => ep_Object::TYPE_STRING,
			'stats_str' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'video' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_posiedzenia_punkty');

	private $_debaty = false;
	private $_wystapienia = false;
	private $_glosowania = false;
	private $_druki = false;
	private $_posiedzenie = false;

	public function posiedzenie(){
		if( !$this->_posiedzenie ) {
			$this->_posiedzenie = new ep_Sejm_Posiedzenie( $this->data['posiedzenie_id'] );
		}

		return $this->_posiedzenie;
	}

	public function debaty(){
		if( !$this->_debaty ) {
			$this->_debaty = new ep_Dataset('sejm_debaty');
			$this->_debaty->init_where('punkt_id', '=', $this->data['id'])->order_by('kolejnosc', 'ASC');
		}
		return $this->_debaty;
	}

	public function wystapienia(){
		if( !$this->_wystapienia ) {
			$this->_wystapienia = new ep_Dataset('sejm_wystapienia');
			$this->_wystapienia->init_where('sejm_wystapienia.punkt_id', '=', $this->data['id'])->order_by('kolejnosc', 'ASC');
		}
		return $this->_wystapienia;
	}

	public function glosowania(){
		if( !$this->_glosowania ) {
			$this->_glosowania = new ep_Dataset('sejm_glosowania');
			$this->_glosowania->init_where('punkt_id', '=', $this->data['id'])->order_by('czas', 'ASC');
		}
		return $this->_glosowania;
	}

	public function druki(){
		if( !$this->_druki ) {
			$this->_druki = new ep_Dataset('sejm_druki');
			$this->_druki->init_where('sejm_posiedzenia_punkty.id', '=', $this->data['id']);
		}
		return $this->_druki;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
