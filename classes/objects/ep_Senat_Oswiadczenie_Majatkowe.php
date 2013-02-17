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
 *   $dataset = new ep_Dataset('senatorowie_oswiadczenia_majatkowe');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Senat_Oswiadczenie_Majatkowe
 *
 * @see ep_Senat_Oswiadczenie_Majatkowe::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
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

	public $_aliases = array('senatorowie_oswiadczenia_majatkowe');

	private $_senator = false;

	public function set_ep_senatorowie($data){
		$this->_senator = new ep_Senator($data);
	}

	public function senator(){
		return $this->_senator;
	}

	public function __toString(){
		return $this->get_nazwa();
	}
}
