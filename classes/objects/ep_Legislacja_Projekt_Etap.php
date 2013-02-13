<?php
class ep_Legislacja_Projekt_Etap extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'czas' => ep_Object::TYPE_STRING,
			'c_id' => ep_Object::TYPE_STRING,
			'data' => ep_Object::TYPE_STRING,
			'data_json' => ep_Object::TYPE_STRING,
			'liczba_dokumentow' => ep_Object::TYPE_STRING,
			'projekt_id' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'_data' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('legislacja_projekty-etapy');

	public function parse_data( $data ){
		parent::parse_data($data);
		// echo "\n";
		// echo $this->data['data_json'];
		$this->data['_data'] = json_decode( $this->data['data_json'], true );
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}