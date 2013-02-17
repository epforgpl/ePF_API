<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Klasa ep__Object - podstawowy składnik biblioteki.
 *
 * Alias: _objects
 *
 * @category   API
 * @package    ePF_API
 * @subpackage Core
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
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
