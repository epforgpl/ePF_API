<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Posel_Oswiadczenie_Majatkowe.
 *
 * Aliasy:
 *   poslowie_oswiadczenia_majatkowe
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('poslowie_oswiadczenia_majatkowe')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 *
 * @example objects/ep_Posel_Oswiadczenie_Majatkowe
 *
 * @see ep_Posel_Oswiadczenie_Majatkowe::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_data()
 * @method int get_dokument_id()
 * @method int get_posel_id()
 * @method string get_label()
 */
class ep_Posel_Oswiadczenie_Majatkowe extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_INT,
			'posel_id' => ep_Object::TYPE_INT,
			'label' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('poslowie_oswiadczenia_majatkowe');
	
	/**
	 * @return string
	 */
	public function getDate(){
		return $this->data['data'];
	}
}
