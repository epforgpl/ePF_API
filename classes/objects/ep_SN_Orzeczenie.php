<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SN_Orzeczenie.
 *
 * Aliasy:
 *   sn_orzeczenia
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sn_orzeczenia');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SN_Orzeczenie
 *
 * @see ep_SN_Orzeczenie::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SN_Orzeczenie extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'akcept' => ep_Object::TYPE_STRING,
			'data' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'forma' => ep_Object::TYPE_STRING,
			'item_id' => ep_Object::TYPE_INT,
			'izby_str' => ep_Object::TYPE_STRING,
			'jednostka_str' => ep_Object::TYPE_STRING,
			'orzeczenie_sn_forma_id' => ep_Object::TYPE_INT,
			'orzeczenie_sn_jednostka_id' => ep_Object::TYPE_INT,
			'orzeczenie_sn_sklad_id' => ep_Object::TYPE_INT,
			'przewodniczacy' => ep_Object::TYPE_STRING,
			'przewodniczacy_id' => ep_Object::TYPE_INT,
			'sprawozdawcy_str' => ep_Object::TYPE_STRING,
			'sygnatura' => ep_Object::TYPE_STRING,
			'wspolsprawozdawcy_str' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array( 'sn_orzeczenia' );

	public $_field_init_lookup = 'sygnatura';

	/**
	 * @var ep_SN_Orzeczenie_Forma
	 */
	protected $_forma = null;

	/**
	 * @var ep_SN_Jednostka
	 */
	protected $_jednostka = null;

	/**
	 * @var ep_SN_Sklad
	 */
	protected $_sklad = null;

	/**
	 * @var ep_Dataset
	 */
	protected $_autorzy = null;

	/**
	 * @var ep_Dataset
	 */
	protected $_izby_orzeczenia = null;

	/**
	 * @var ep_Dataset
	 */
	protected $_sedziowie = null;

	/**
	 * @var ep_Dataset
	 */
	protected $_sprawozdawcy = null;

	/**
	 * @var ep_Dataset
	 */
	protected $_wspolsprawozdawcy = null;

	/**
	 * @return string
	 */
	public function __toString(){
		return (string) $this->get_sygnatura();
	}

	/**
	 * @return ep_SN_Orzeczenie_Forma
	 */
	public function forma(){
		if( !$this->_forma ) {
			$this->_forma = new ep_SN_Orzeczenie_Forma( $this->get_orzeczenie_sn_forma_id() );
		}
		return $this->_forma;
	}

	/**
	 * @return ep_SN_Jednostka
	 */
	public function jednostka(){
		if( !$this->_jednostka ) {
			$this->_jednostka = new ep_SN_Jednostka( $this->get_orzeczenie_sn_jednostka_id() );
		}
		return $this->_jednostka;
	}

	/**
	 * @return ep_SN_Sklad
	 */
	public function sklad(){
		if( !$this->_sklad ) {
			$this->_sklad = new ep_SN_Sklad( $this->get_orzeczenie_sn_sklad_id() );
		}
		return $this->_sklad;
	}

	/**
	 * @return ep_Dataset
	 */
	public function autorzy(){
		if( !$this->_autorzy ) {
			$this->_autorzy = new ep_Dataset( 'sn_orzeczenia_ludzie' );
			$this->_autorzy->init_where( 'orzeczenie_sn_id', '=', $this->id );
		}
		return $this->_autorzy;
	}

	/**
	 * @return ep_Dataset
	 */
	public function izby_orzeczenia(){
		if( !$this->_izby_orzeczenia ) {
			$this->_izby_orzeczenia = new ep_Dataset( 'sn_izby-orzeczenia' );
			$this->_izby_orzeczenia->init_where( 'orzeczenie_sn_id', '=', $this->id );
		}
		return $this->_izby_orzeczenia;
	}

	/**
	 * @return ep_Dataset
	 */
	public function sedziowie(){
		if( !$this->_sedziowie ) {
			$this->_sedziowie = new ep_Dataset( 'sn_sedziowie' );
			$this->_sedziowie->init_where( 'orzeczenie_sn_id', '=', $this->id );
		}
		return $this->_sedziowie;
	}

	/**
	 * @return ep_Dataset
	 */
	public function sprawozdawcy(){
		if( !$this->_sprawozdawcy ) {
			$this->_sprawozdawcy = new ep_Dataset( 'sn_sprawozdawcy' );
			$this->_sprawozdawcy->init_where( 'orzeczenie_sn_id', '=', $this->id );
		}
		return $this->_sprawozdawcy;
	}

	/**
	 * @return ep_Dataset
	 */
	public function wspolsprawozdawcy(){
		if( !$this->_wspolsprawozdawcy ) {
			$this->_wspolsprawozdawcy = new ep_Dataset( 'sn_wspolsprawozdawcy' );
			$this->_wspolsprawozdawcy->init_where( 'orzeczenie_sn_id', '=', $this->id );
		}
		return $this->_wspolsprawozdawcy;
	}
}
