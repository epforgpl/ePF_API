<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Senat_senator_komisja.
 *
 * Aliasy:
 *   senat_senatorowie_komisje
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('senat_senatorowie_komisje');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Senat_senator_komisja
 *
 * @see ep_Senat_senator_komisja::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Senat_senator_komisja extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'komisja_id' => ep_Object::TYPE_INT,
			'senator_id' => ep_Object::TYPE_INT,
			'stanowisko' => ep_Object::TYPE_METHOD,
			'data_do' => ep_Object::TYPE_STRING,
			'data_od' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('senat_senatorowie_komisje');

	private $_komisja = false;
	private $_senator = false;

	/**
	 * @return string
	 */
	public function get_stanowisko(){
		$str = trim( ucfirst( mb_strtolower( $this->data['stanowisko'], 'UTF-8' ) ) );
		if( $str == '' ){
			$str = 'Członek';
		}
		return (string)$str;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_stanowisko();
	}

	public function komisja(){
		if( !$this->_komisja ){
			$this->_komisja = new ep_Senat_komisja($this->get_komisja_id() );
		}
		return $this->_komisja;
	}

	public function senator(){
		if( !$this->_senator ){
			$this->_senator = new ep_Senator($this->get_senator_id() );
		}
		return $this->_senator;
	}
}
