<?php
class ep_SN_Izba extends ep_Object{

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

	public $_aliases = array( 'sn_izby' );

	public $_field_init_lookup = 'nazwa';

	/**
	 * @var ep_Dataset
	 */
	protected $_orzeczenia = null;

	/**
	 * @return string
	 */
	public function __toString(){
		return (string) $this->get_nazwa();
	}

	/**
	 * @return ep_Dataset
	 */
	public function orzeczenia(){
		if( !$this->_orzeczenia ) {
			$this->_orzeczenia = new ep_Dataset( 'sn_izby-orzeczenia' );
			$this->_orzeczenia->init_where( 'orzeczenie_sn_izba_id', '=', $this->id );
		}
		return $this->_orzeczenia;
	}
}