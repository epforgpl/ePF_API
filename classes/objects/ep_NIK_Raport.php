<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_NIK_Raport.
 *
 * Aliasy:
 *   nik_raporty
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('nik_raporty')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 *
 * Dostępne dodatkowe warstwy danych:
 * docs
 *
 * Przykład:
 * <code>
 * 	 $data = $object->load_layer('docs');
 * </code>
 *
 * @example objects/ep_NIK_Raport
 *
 * @see ep_NIK_Raport::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_data_moderacji()
 * @method string get_data_publikacji()
 * @method string get_dokument_id()
 * @method string get_nik_id()
 * @method string get_numer()
 * @method string get_pdf_id()
 * @method string get_tytul()
 */
class ep_NIK_Raport extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data_moderacji' => ep_Object::TYPE_STRING,
			'data_publikacji' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'nik_id' => ep_Object::TYPE_STRING,
			'numer' => ep_Object::TYPE_STRING,
			'pdf_id' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('nik_raporty');

	/**
	 * @var string
	 */
	public function getDate(){	
		return $this->data['data_publikacji'];
	}
}
