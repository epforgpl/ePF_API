<?php
class ep_Sejm_Sprawozdanie extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'url' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_sprawozdania');
	public $_field_init_lookup = 'tytul';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}