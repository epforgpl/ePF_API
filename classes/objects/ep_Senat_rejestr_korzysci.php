<?php
//
class ep_Senat_rejestr_korzysci extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'dokument_id' => ep_Object::TYPE_INT,
			'nazwa' => ep_Object::TYPE_STRING,
			'senator_id' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('senat_rejestr_korzysci');
	public $_field_init_lookup = 'nazwa';

	private $_senator = false;

	public function set_ep_senatorowie($data){
		$this->_senator = new ep_Senator($data);
	}

	public function senator(){
		return $this->_senator;
	}

	public function __toString(){
		return $this->get_nazwa();
	}
}