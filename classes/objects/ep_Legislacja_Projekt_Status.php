<?php
class ep_Legislacja_Projekt_Status extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'kolejnosc' => ep_Object::TYPE_STRING,
			'nazwa' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('legislacja_projekty_statusy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}