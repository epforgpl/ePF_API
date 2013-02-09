<?php
class ep_Senat_Druk extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'numer' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('senat_druki');
	public $_field_init_lookup = 'numer';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}