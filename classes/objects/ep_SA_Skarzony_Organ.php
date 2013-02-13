<?php
class ep_SA_Skarzony_Organ extends ep_Object{

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

	public $_aliases = array('sa_skarzone_organy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}