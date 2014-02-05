<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Senat_Oswiadczenie_Majatkowe.
 *
 * Aliasy:
 *   senatorowie_oswiadczenia_majatkowe
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('senatorowie_oswiadczenia_majatkowe')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 *
 * @example objects/ep_Senat_Oswiadczenie_Majatkowe
 *
 * @see ep_Senat_Oswiadczenie_Majatkowe::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method int get_dokument_id()
 * @method int get_senator_id()
 * @method string get_nazwa()
 */
class ep_Senat_Oswiadczenie_Majatkowe extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'dokument_id' => ep_Object::TYPE_INT,
			'senator_id' => ep_Object::TYPE_INT,
			'nazwa' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('senatorowie_oswiadczenia_majatkowe');

}
