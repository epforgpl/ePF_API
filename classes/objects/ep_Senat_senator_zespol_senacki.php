<?php
//ep_Senat_senator_zespol_senacki
//senat_senatorowie_zespoly_senackie

class ep_Senat_senator_zespol_senacki extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'zespol_senacki_id' => ep_Object::TYPE_INT,
			'senator_id' => ep_Object::TYPE_INT,
			'data_do' => ep_Object::TYPE_STRING,
			'data_od' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('senat_senatorowie_zespoly_senackie');

	private $_zespol_senacki = false;
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

	public function zespol_senacki(){
		if( !$this->_zespol_senacki ){
			$this->_zespol_senacki = new ep_Senat_Zespol( $this->get_zespol_senacki_id() );
		}
		return $this->_zespol_senacki;
	}

	public function senator(){
		if( !$this->_senator ){
			$this->_senator = new ep_Senator( $this->get_senator_id() );
		}
		return $this->_senator;
	}
}