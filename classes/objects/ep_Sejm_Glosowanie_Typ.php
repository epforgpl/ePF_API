<?php
class ep_Sejm_Glosowanie_Typ extends ep_Object{

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

	public $_aliases = array('sejm_glosowania_typy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}