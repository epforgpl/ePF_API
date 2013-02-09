<?php
class ep_Posel_Oswiadczenie_Majatkowe extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_INT,
			'posel_id' => ep_Object::TYPE_INT,
			'label' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('poslowie_oswiadczenia_majatkowe');
	public $_field_init_lookup = 'label';

	private $_posel = false;

	public function set_ep_poslowie($data){
		$this->_posel = new ep_Posel($data);
	}

	public function posel(){
		return $this->_posel;
	}

	public function __toString(){
		return $this->get_nazwa();
	}
}