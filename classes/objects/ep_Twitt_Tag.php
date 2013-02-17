<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Twitt_Tag.
 *
 * Aliasy:
 *   twitter_tags
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('twitter_tags');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Twitt_Tag
 *
 * @see ep_Twitt_Tag::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Twitt_Tag extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			//FIXME missing definition
		));
		return $result;
	}

	public $_aliases = array('twitter_tags');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}
