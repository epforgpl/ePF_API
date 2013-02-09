<?php
class ep_Twitt_Tag extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
		));
		return $result;
	}

	public $_aliases = array('twitter_tags');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}