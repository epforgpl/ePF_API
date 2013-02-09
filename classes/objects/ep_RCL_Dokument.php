<?php
class ep_RCL_Dokument extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'dokument_id' => ep_Object::TYPE_STRING,
			'katalog_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('rcl_dokumenty');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}