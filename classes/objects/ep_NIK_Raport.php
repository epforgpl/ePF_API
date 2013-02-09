<?php
class ep_NIK_Raport extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data_moderacji' => ep_Object::TYPE_STRING,
			'data_publikacji' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'nik_id' => ep_Object::TYPE_STRING,
			'numer' => ep_Object::TYPE_STRING,
			'pdf_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('nik_raporty');
	public $_field_init_lookup = 'numer';

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}