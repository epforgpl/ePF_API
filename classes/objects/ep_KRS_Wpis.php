<?php
class ep_KRS_Wpis extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			//FIXME missing definition
		));
		return $result;
	}

	public $_aliases = array('krs');
	public $_field_init_lookup = 'krs';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}