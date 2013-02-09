<?php
class ep_Sejm_Glosowanie_Glos extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'color' => ep_Object::TYPE_STRING,
			'nazwa' => ep_Object::TYPE_STRING,
			'opis' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_glosowania_glosy');

	/**
	 * @return string
	 */
	public function get_color(){
		return (string)$this->data['color'];
	}

	/**
	 * @return string
	 */
	public function get_nazwa(){
		return (string)$this->data['nazwa'];
	}

	/**
	 * @return string
	 */
	public function get_opis(){
		return (string)$this->data['opis'];
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}