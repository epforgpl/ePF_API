<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SP_Orzeczenie.
 *
 * Aliasy:
 *   sp_orzeczenia
 *   sady_sp
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sp_orzeczenia');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SP_Orzeczenie
 *
 * @see ep_SP_Orzeczenie::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SP_Orzeczenie extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'akcept' => ep_Object::TYPE_INT,
			'data' => ep_Object::TYPE_STRING,
			'hasla_tematyczne' => ep_Object::TYPE_STRING,
			'podstawa_prawna' => ep_Object::TYPE_STRING,
			'sad_sp_id' => ep_Object::TYPE_INT,
			'sad' => ep_Object::TYPE_STRING,
			'str_ident' => ep_Object::TYPE_STRING,
			'sygnatura' => ep_Object::TYPE_STRING,
			'teza' => ep_Object::TYPE_STRING,
			'typ' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_INT,
			'wydzial' => ep_Object::TYPE_STRING,
			'dopelniacz' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array( 'sp_orzeczenia', 'sady_sp' );

	/**
	 * @var ep_Sad_sp
	 */
	protected $_sad_sp = null;

	/**
	 * @var ep_Dataset
	 */
	protected $_bloki = null;

	/**
	 * @var ep_Dataset
	 */
	protected $_hasla = null;

	/**
	 * @var ep_Dataset
	 */
	protected $_osoby_stanowiska = null;

	/**
	 * @var ep_Dataset
	 */
	protected $_przepisy = null;

	/**
	 * @return string
	 */
	public function __toString(){
		return (string) $this->get_sygnatura();
	}

	/**
	 * @return ep_Sad_sp
	 */
	public function sad_sp(){
		if( !$this->_sad_sp ) {
			$this->_sad_sp = new ep_SP_Sad( $this->get_sad_sp_id() );
		}
		return $this->_sad_sp;
	}

	/**
	 * @return ep_Dataset
	 */
	public function bloki(){
		if( !$this->_bloki ) {
			$this->_bloki = new ep_Dataset( 'sp_orzeczenia_czesci' );
			$this->_bloki->init_where( 'orzeczenie_sp_id', '=', $this->id );
		}
		return $this->_bloki;
	}

	/**
	 * @return ep_Dataset
	 */
	public function hasla(){
		if( !$this->_hasla ) {
			$this->_hasla = new ep_Dataset( 'sp_orzeczenia_hasla' );
			$this->_hasla->init_where( 'orzeczenie_sp_id', '=', $this->id );
		}
		return $this->_hasla;
	}

	/**
	 * @return ep_Dataset
	 */
	public function osoby_stanowiska(){
		if( !$this->_osoby_stanowiska ) {
			$this->_osoby_stanowiska = new ep_Dataset( 'sp_ludzie' );
			$this->_osoby_stanowiska->init_layer('sp_ludzie_stanowiska')->init_where( 'sp_ludzie_stanowiska.orzeczenie_sp_id', '=', $this->id );
		}
		return $this->_osoby_stanowiska;
	}

	/**
	 * @return ep_Dataset
	 */
	public function przepisy(){
		if( !$this->_przepisy ) {
			$this->_przepisy = new ep_Dataset( 'sp_przepisy' );
			$this->_przepisy->init_where( 'orzeczenie_sp_id', '=', $this->id );
		}
		return $this->_przepisy;
	}
}
