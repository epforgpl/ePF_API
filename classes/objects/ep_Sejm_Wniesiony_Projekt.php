<?php
class ep_Sejm_Wniesiony_Projekt extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'autor_str' => ep_Object::TYPE_STRING,
			'data' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'opis' => ep_Object::TYPE_STRING,
			'opis_str' => ep_Object::TYPE_STRING,
			'projekt_id' => ep_Object::TYPE_STRING,
			'przebieg_str' => ep_Object::TYPE_STRING,
			'reprezentant_funkcja_id' => ep_Object::TYPE_STRING,
			'reprezentant_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'tytul_skrocony' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('sejm_wniesione_projekty');

	public function projekt(){
		if( $this->data['projekt_id'] ){
			return ep_Legislacja_Projekt( $this->data['projekt_id'] );
		}
		else{
			return false;
		}
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}