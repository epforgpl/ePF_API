<?php
class ep_Sejm_Komunikat extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'date' => ep_Object::TYPE_STRING,
			'datetime' => ep_Object::TYPE_STRING,
			'img' => ep_Object::TYPE_STRING,
			'opis' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_komunikaty');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}