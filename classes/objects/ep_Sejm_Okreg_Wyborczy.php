<?php
class ep_Sejm_Okreg_Wyborczy extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'enspat' => ep_Object::TYPE_STRING,
			'google_zoom' => ep_Object::TYPE_STRING,
			'granice_obwodu_str' => ep_Object::TYPE_STRING,
			'liczba_wyborcow' => ep_Object::TYPE_STRING,
			'numer' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_okregi_wyborcze');
	public $_field_init_lookup = 'numer';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}