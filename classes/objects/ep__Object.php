<?php
class ep__Object extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'class' => ep_Object::TYPE_STRING,
			'dataset' => ep_Object::TYPE_STRING,
			'enabled' => ep_Object::TYPE_STRING,
			'listing' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('_objects');
	public $_field_init_lookup = 'class';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}