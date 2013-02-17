<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SP_Orzeczenie_Czesc.
 *
 * Aliasy:
 *   sp_orzeczenia_czesci
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sp_orzeczenia_czesci');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SP_Orzeczenie_Czesc
 *
 * @see ep_SP_Orzeczenie_Czesc::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SP_Orzeczenie_Czesc extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'orzeczenie_sp_id' => ep_Object::TYPE_INT,
			'tytul' => ep_Object::TYPE_STRING,
			'wartosc' => ep_Object::TYPE_METHOD,
		));
		return $result;
	}

	public $_aliases = array( 'sp_orzeczenia_czesci' );

	/**
	 * @var ep_SP_Orzeczenie
	 */
	protected $_orzeczenie_sp = null;

	/**
	 * @return string
	 */
	public function get_wartosc(){
		if( file_exists( ROOT . '/../epanstwo/_resources/sp/bloki/' . $this->get_id() . '.html') ) {
			return file_get_contents(ROOT . '/../epanstwo/_resources/sp/bloki/' . $this->get_id() . '.html') ;
		} else {
			return (string) $this->data['wartosc'];
		}
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return (string) $this->get_tytul();
	}

	/**
	 * @return ep_SP_Orzeczenie
	 */
	public function orzeczenie_sp(){
		if( !$this->_orzeczenie_sp ) {
			$this->_orzeczenie_sp = new ep_SP_Orzeczenie( $this->get_orzeczenie_sp_id() );
		}
		return $this->_orzeczenie_sp;
	}
}
