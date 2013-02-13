<?php
class ep_Sejm_Interpelacja_Pismo extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'adresaci_str' => ep_Object::TYPE_STRING,
			'akcept' => ep_Object::TYPE_STRING,
			'autor_str' => ep_Object::TYPE_STRING,
			'data' => ep_Object::TYPE_STRING,
			'data_ogloszenia' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'html' => ep_Object::TYPE_STRING,
			'i' => ep_Object::TYPE_STRING,
			'interpelacja_id' => ep_Object::TYPE_STRING,
			'nazwa' => ep_Object::TYPE_STRING,
			'oglosznie_posiedzenie_id' => ep_Object::TYPE_STRING,
			'pole_id' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_interpelacje_pisma');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}