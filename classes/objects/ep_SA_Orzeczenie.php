<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SA_Orzeczenie.
 *
 * Aliasy:
 *   sa_orzeczenia
 *   sa_orzeczenia_typy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sa_orzeczenia');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SA_Orzeczenie
 *
 * @see ep_SA_Orzeczenie::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SA_Orzeczenie extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data_orzeczenia' => ep_Object::TYPE_STRING,
			'data_wplywu' => ep_Object::TYPE_STRING,
			'dlugosc_rozpatrywania' => ep_Object::TYPE_STRING,
			'hasla_str' => ep_Object::TYPE_STRING,
			'odrebne_status' => ep_Object::TYPE_STRING,
			'prawomocne' => ep_Object::TYPE_STRING,
			'sad_dopelniacz' => ep_Object::TYPE_STRING,
			'sad_nazwa' => ep_Object::TYPE_STRING,
			'sentencja_status' => ep_Object::TYPE_STRING,
			'skarzony_organ_id' => ep_Object::TYPE_STRING,
			'skarzony_organ_str' => ep_Object::TYPE_STRING,
			'sygnatura' => ep_Object::TYPE_STRING,
			'tezy_status' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			'typ_str' => ep_Object::TYPE_STRING,
			'uzasadnienie_status' => ep_Object::TYPE_STRING,
			'uzo_status' => ep_Object::TYPE_STRING,
			'wynik_str' => ep_Object::TYPE_STRING,
			'tytul_skrocony' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sa_orzeczenia', 'sa_orzeczenia_typy');
	public $_field_init_lookup = 'sygnatura';

	private $_sad;
	private $_organ;
	private $_wynik;
	private $_sedziowie;

	public function __construct( $data, $complex = true ){
		parent::__construct( $data, $complex );
		$sad = $this->sad()->data;//FIXME Trying to get property of non-object
		$this->data['tytul_skrocony'] = $this->data['nazwa'].' '.$sad['dopelniacz'].'	z dnia '.sm_data_slowna($this->data['data_orzeczenia']);
		$this->data['tytul'] = $this->data['sygnatura'];//FIXME Undefined index: sygnatura
	}

	public function sedziowie() {
		if( !$this->_sedziowie ) {
			$this->_sedziowie = new ep_Dataset('sa_sedziowie');
			$this->_sedziowie->init_where('sa_sedziowie_orzeczenia.orzeczenie_id', '=', $this->id);
		}

		return $this->_sedziowie;
	}

	public function set_ep_sa_sady($data){
		$this->_sad = new ep_SA_Sad($data);
	}

	public function sad(){
		return $this->_sad;
	}

	public function set_ep_sa_skarzone_organy($data){
		$this->_organ = new ep_SA_Skarzony_Organ($data);
	}

	public function skarzony_organ(){
		return $this->_organ;
	}

	public function set_ep_sa_orzeczenia_wyniki($data){
		$this->_wynik = new ep_SA_Orzeczenie_Wynik($data);
	}

	public function wynik(){
		return $this->_wynik;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
