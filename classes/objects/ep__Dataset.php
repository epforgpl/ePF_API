<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Klasa ep__Dataset - podstawowy składnik biblioteki.
 *
 * Alias: _datasets
 *
 * @category   API
 * @package    ePF_API
 * @subpackage Core
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep__Dataset extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'base_alias' => ep_Object::TYPE_STRING,
			'count' => ep_Object::TYPE_STRING,
			'name' => ep_Object::TYPE_STRING,
			'opis' => ep_Object::TYPE_STRING,
			'order' => ep_Object::TYPE_STRING,
			'parent_alias' => ep_Object::TYPE_STRING,
			'public' => ep_Object::TYPE_STRING,
			'results_class' => ep_Object::TYPE_STRING,
			'zrodlo' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('_datasets');
	public $_field_init_lookup = 'base_alias';

	public function __construct( $data ) {
		$id = $data['_datasets.base_alias'];
		if( !$id ){
			return false;
		}

		$this->id = $id;
		$this->loaded = $this->parse_data( $data );
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
