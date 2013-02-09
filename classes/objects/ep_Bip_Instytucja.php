<?php
class ep_Bip_Instytucja extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array( 'bip_instytucje' );

	/**
	 * @return string
	 */
	public function __toString(){
		return (string) $this->get_nazwa();
	}
}