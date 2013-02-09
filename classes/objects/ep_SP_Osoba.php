<?php
class ep_SP_Osoba extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array( 'sp_ludzie' );

	public $_field_init_lookup = 'nazwa';

	/**
	 * @var ep_Dataset
	 */
	protected $_stanowiska = null;

	/**
	 * @return string
	 */
	public function __toString(){
		return (string) $this->get_nazwa();
	}

	/**
	 * @return ep_Dataset
	 */
	public function stanowiska(){
		if( !$this->_stanowiska ) {
			$this->_stanowiska = new ep_Dataset( 'sp_ludzie_stanowiska' );
			$this->_stanowiska->init_where( 'orzeczenie_sp_osoba_id', '=', $this->id );
		}
		return $this->_stanowiska;
	}
}