<?php
class ep_Legislacja_Projekt_Podpis extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'klub_id' => ep_Object::TYPE_STRING,
			'posel_id' => ep_Object::TYPE_STRING,
			'projekt_id' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('legislacja_projekty-podpisy');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}