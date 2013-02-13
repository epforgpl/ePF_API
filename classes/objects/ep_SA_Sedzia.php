<?php
class ep_SA_Sedzia extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
			'orzeczenie_id' => ep_Object::TYPE_STRING,
			'stanowisko_id' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sa_sedziowie', 'sa_sedziowie_orzeczenia');
	public $_field_init_lookup = 'nazwa';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}