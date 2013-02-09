<?php
class ep_Prawo_Typ extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'prawo_typ_nazwa' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('prawo_typy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}