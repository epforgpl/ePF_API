<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SA_Orzeczenie.
 *
 * Aliasy:
 *   sa_orzeczenia
 *   sa_orzeczenia_typy
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('sa_orzeczenia')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 *
 * Dostępne dodatkowe warstwy danych:
 * html
 *
 * Przykład:
 * <code>
 * 	 $data = $object->load_layer('html');
 * </code>
 *
 * @example objects/ep_SA_Orzeczenie
 *
 * @see ep_SA_Orzeczenie::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_data_orzeczenia()
 * @method string get_data_wplywu()
 * @method string get_dlugosc_rozpatrywania()
 * @method string get_hasla_str()
 * @method string get_odrebne_status()
 * @method string get_prawomocne()
 * @method string get_sad_dopelniacz()
 * @method string get_sad_nazwa()
 * @method string get_sentencja_status()
 * @method string get_skarzony_organ_id()
 * @method string get_skarzony_organ_str()
 * @method string get_sygnatura()
 * @method string get_tezy_status()
 * @method string get_typ_id()
 * @method string get_typ_str()
 * @method string get_uzasadnienie_status()
 * @method string get_uzo_status()
 * @method string get_wynik_str()
 * @method string get_tytul_skrocony()
 * @method string get_tytul()
 */
class ep_SA_Orzeczenie extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data_orzeczenia' => ep_Object::TYPE_STRING,
			'data_wplywu' => ep_Object::TYPE_STRING,
			'dlugosc_rozpatrywania' => ep_Object::TYPE_STRING,
			'hasla_str' => ep_Object::TYPE_STRING,
			'odrebne_status' => ep_Object::TYPE_STRING,
			'prawomocne' => ep_Object::TYPE_STRING,
			'sad_dopelniacz' => ep_Object::TYPE_STRING,
			'sad_nazwa' => ep_Object::TYPE_STRING,
			'sentencja_status' => ep_Object::TYPE_STRING,
			'skarzony_organ_id' => ep_Object::TYPE_STRING,
			'skarzony_organ_str' => ep_Object::TYPE_STRING,
			'sygnatura' => ep_Object::TYPE_STRING,
			'tezy_status' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			'typ_str' => ep_Object::TYPE_STRING,
			'uzasadnienie_status' => ep_Object::TYPE_STRING,
			'uzo_status' => ep_Object::TYPE_STRING,
			'wynik_str' => ep_Object::TYPE_STRING,
			'tytul_skrocony' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('sa_orzeczenia', 'sa_orzeczenia_typy');

	/**
	 * @return string
	 */
	public function getDate(){	
		return $this->data['data_orzeczenia'];
	}
}
