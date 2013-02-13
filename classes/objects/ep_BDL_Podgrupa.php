<?php
class ep_BDL_Podgrupa extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'archiwum' => ep_Object::TYPE_STRING,
			'grupa_id' => ep_Object::TYPE_STRING,
			'kategoria_id' => ep_Object::TYPE_STRING,
			'okres' => ep_Object::TYPE_STRING,
			'slug' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('bdl_wskazniki_podgrupy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}