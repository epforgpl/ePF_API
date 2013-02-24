<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Gmina.
 *
 * Aliasy:
 *   gminy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('gminy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Gmina
 *
 * @see ep_Gmina::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Gmina extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_INT,
			'adres' => ep_Object::TYPE_STRING,
			'bip_www' => ep_Object::TYPE_STRING,
			'dochody_roczne' => ep_Object::TYPE_STRING,
			'email' => ep_Object::TYPE_STRING,
			'fax' => ep_Object::TYPE_STRING,
			'liczba_ludnosci' => ep_Object::TYPE_STRING,
			'nazwa_urzedu' => ep_Object::TYPE_STRING,
			'nts' => ep_Object::TYPE_STRING,
			'powiat_id' => ep_Object::TYPE_STRING,
			'powierzchnia' => ep_Object::TYPE_STRING,
			'rada_nazwa' => ep_Object::TYPE_STRING,
			'szef_stanowisko_id' => ep_Object::TYPE_STRING,
			'telefon' => ep_Object::TYPE_STRING,
			'teryt' => ep_Object::TYPE_STRING,
			'wojewodztwo_id' => ep_Object::TYPE_STRING,
			'wydatki_roczne' => ep_Object::TYPE_STRING,
			'zadluzenie_roczne' => ep_Object::TYPE_STRING,
			'typ_nazwa' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('gminy');
	public $_field_init_lookup = 'nazwa';

	private $_pna = false;

	public function parse_data($data){
		parent::parse_data($data);

		switch( $this->data['typ_id'] ) {
			case '1': {
				$this->data['typ_nazwa'] = 'Gmina miejska'; break;
			}
			case '2': {
				$this->data['typ_nazwa'] = 'Gmina wiejska'; break;
			}
			case '3': {
				$this->data['typ_nazwa'] = 'Gmina miejsko-wiejska'; break;
			}
			case '4': {
				$this->data['typ_nazwa'] = 'Miasto stołeczne'; break;
			}
		}
	}

	public function pna(){
		if( !$this->_pna ) {
			$this->_pna = new ep_Dataset('kody_pocztowe_miejsca');
			$this->_pna->init_where('gmina_id', '=', $this->data['id']);
		}
		return $this->_pna;
	}

	/**
	 * @var ep_Wojewodztwo
	 */
	protected $_wojewodztwo = null;

	/**
	 * @var ep_Powiat
	 */
	protected $_powiat = null;

	/**
	 * @var ep_Area
	 */
	protected $_obszar = null;

	/**
	 * @return ep_Wojewodztwo
	 */
	public function wojewodztwo(){
		return $this->_wojewodztwo;
	}

	protected $_poslowie_dataset = null;
	public function poslowie(){
		if( !$this->_poslowie_dataset ) {

			$this->_poslowie_dataset = new ep_Dataset('poslowie');
			$this->_poslowie_dataset->init_where('sejm_okreg_id', '=', $this->powiat()->data['sejm_okreg_id']);
		}

		return $this->_poslowie_dataset;
	}

	/**
	 * @return ep_Powiat
	 */
	public function powiat(){
		return $this->_powiat;
	}

	/**
	 * @param array|ep_Wojewodztwo $data
	 */
	public function set_ep_wojewodztwa( $data ){
		if( $data instanceof ep_Wojewodztwo ){
			$this->_wojewodztwo = $data;
		} else {
			$this->_wojewodztwo = new ep_Wojewodztwo( $data, false );
		}

		if( $this->powiat() && !$this->powiat()->wojewodztwo() ){
			$this->_powiat->set_ep_wojewodztwo( $this->wojewodztwo() );
		}
		return $this;
	}

	/**
	 * @param array|ep_Powiat $data
	 */
	public function set_ep_powiaty( $data ){
		if( $data instanceof ep_Powiat ){
			$this->_powiat = $data;
		} else {
			$this->_powiat = new ep_Powiat( $data, false );
		}

		if( $this->wojewodztwo() && !$this->powiat()->wojewodztwo()	){
			$this->_powiat->set_ep_wojewodztwo( $this->wojewodztwo() );
		}
		return $this;
	}

	public function set_ep_Powiat( $data ){
		if( $data instanceof ep_Powiat ){
			$this->_powiat = $data;
		} else {
			$this->_powiat = new ep_Powiat( $data, false );
		}

		if( $this->wojewodztwo() && !$this->powiat()->wojewodztwo()	){
			$this->_powiat->set_ep_wojewodztwo( $this->wojewodztwo() );
		}
		return $this;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}

	/**
	 * @return ep_Area
	 */
	public function obszar(){
		if( $this->_obszar === null ){
			$this->_obszar = ep_Area::init()->set_raw_data( ep_Api::init()->call( get_class($this) . '/obszar', array( 'id' => $this->id ) ) );
		}
		return $this->_obszar;
	}
}
