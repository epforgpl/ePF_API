<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Twitt.
 *
 * Aliasy:
 *   twitter
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('twitter')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 *
 * @example objects/ep_Twitt
 *
 * @see ep_Twitt::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_created_at()
 * @method string get_html()
 * @method string get_posel_id()
 * @method string get_twitter_user_id()
 * @method string get_twitt_id()
 */
class ep_Twitt extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'created_at' => ep_Object::TYPE_STRING,
			'html' => ep_Object::TYPE_STRING,
			'posel_id' => ep_Object::TYPE_STRING,
			'twitter_user_id' => ep_Object::TYPE_STRING,
			'twitt_id' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('twitter');
	
	/**
	 * @return string
	 */
	public function getDate(){
		return $this->data['created_at'];
	}
	
	/**
	 * @return string
	 */
	public function getTitle(){
		return $this->data['html'];
	}
	
	/**
	 * @return string
	 */
	public function getDatetime(){
		return $this->data['created_at'];
	}
}
