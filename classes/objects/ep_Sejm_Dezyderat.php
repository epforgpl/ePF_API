<?php
class ep_Sejm_Dezyderat extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_dezyderaty');
	public $_field_init_lookup = 'tytul';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}