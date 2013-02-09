<?php
class ep_ISAP_Plik extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'dokument_id' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('isap_pliki');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}