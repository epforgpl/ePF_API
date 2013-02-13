<?php
class ep_Twitt extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'created_at' => ep_Object::TYPE_STRING,
			'html' => ep_Object::TYPE_STRING,
			'posel_id' => ep_Object::TYPE_STRING,
			'twitter_user_id' => ep_Object::TYPE_STRING,
			'twitt_id' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('twitter');
	private $_posel = false;

	public function set_ep_poslowie( $data ){
		$this->_posel = new ep_Posel( $data );
	}

	public function posel(){
		return $this->_posel;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}