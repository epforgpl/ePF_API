<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Senat_senator_zespol_parlamentarny.
 *
 * Aliasy:
 *   senat_senatorowie_zespoly_parlamentarne
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('senat_senatorowie_zespoly_parlamentarne');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Senat_senator_zespol_parlamentarny
 *
 * @see ep_Senat_senator_zespol_parlamentarny::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */

//ep_Senat_senator_zespol_parlamentarny
//senat_senatorowie_zespoly_parlamentarne

class ep_Senat_senator_zespol_parlamentarny extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'zespol_parlamentarny_id' => ep_Object::TYPE_INT,
			'senator_id' => ep_Object::TYPE_INT,
			'data_do' => ep_Object::TYPE_STRING,
			'data_od' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('senat_senatorowie_zespoly_parlamentarne');

	private $_zespol_parlamentarny = false;
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

	public function zespol_parlamentarny(){
		if( !$this->_zespol_parlamentarny ){
			$this->_zespol_parlamentarny = new ep_Senat_zespol_parlamentarny( $this->get_zespol_parlamentarny_id() );
		}
		return $this->_zespol_parlamentarny;
	}

	public function senator(){
		if( !$this->_senator ){
			$this->_senator = new ep_Senator( $this->get_senator_id() );
		}
		return $this->_senator;
	}
}
