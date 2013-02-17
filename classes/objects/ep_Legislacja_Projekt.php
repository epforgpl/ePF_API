<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Legislacja_Projekt.
 *
 * Aliasy:
 *   legislacja_projekty_ustaw
 *   legislacja_projekty_uchwal
 *   legislacja_projekty
 *   konsultacje
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('legislacja_projekty_ustaw');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Legislacja_Projekt
 *
 * @see ep_Legislacja_Projekt::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Legislacja_Projekt extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'autorzy_html' => ep_Object::TYPE_STRING,
			'autor_typ_id' => ep_Object::TYPE_STRING,
			'data' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'opis' => ep_Object::TYPE_STRING,
			'opis_skrocony' => ep_Object::TYPE_STRING,
			'ostatnia_tresc_etap_id' => ep_Object::TYPE_STRING,
			'ostatni_etap_id' => ep_Object::TYPE_STRING,
			'rcl_projekt_id' => ep_Object::TYPE_STRING,
			'status_data' => ep_Object::TYPE_STRING,
			'status_id' => ep_Object::TYPE_STRING,
			'status_str' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'tytul_skrocony' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('legislacja_projekty_ustaw','legislacja_projekty_uchwal','legislacja_projekty','konsultacje');
	public $_field_init_lookup = 'tytul';
	private $_etapy = false;
	private $_zmieniane_ustawy = false;
	private $_podpisy_poslowie = false;

	public function etapy(){
		if( !$this->_etapy ) {
			$this->_etapy = new ep_Dataset('legislacja_projekty-etapy');
			$this->_etapy->init_where('projekt_id', '=', $this->data['id']);
		}

		return $this->_etapy;
	}

	public function zmieniane_ustawy(){
		if( !$this->_zmieniane_ustawy ) {
			$this->_zmieniane_ustawy = new ep_Dataset('ustawy');
			$this->_zmieniane_ustawy->init_where('legislacja_projekty-prawo_glowne.projekt_id', '=', $this->data['id']);
		}
		return $this->_zmieniane_ustawy;
	}

	public function podpisy_poslowie(){
		if( !$this->_podpisy_poslowie ) {

			$this->_podpisy_poslowie = new ep_Dataset('legislacja_projekty-podpisy');
			$this->_podpisy_poslowie->init_where('projekt_id', '=', $this->data['id']);
		}
		return $this->_podpisy_poslowie;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
