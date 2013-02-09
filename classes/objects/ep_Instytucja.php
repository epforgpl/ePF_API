<?php
class ep_Instytucja extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
			'dopelniacz' => ep_Object::TYPE_STRING,
			'skrot' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('instytucje');
	public $_field_init_lookup = 'nazwa';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}