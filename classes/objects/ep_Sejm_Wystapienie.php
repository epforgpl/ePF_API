<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Wystapienie.
 *
 * Aliasy:
 *   sejm_wystapienia
 *   sejm_posiedzenia_dni
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('sejm_wystapienia')->load();
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
 * @example objects/ep_Sejm_Wystapienie
 *
 * @see ep_Sejm_Wystapienie::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_data()
 * @method string get_posiedzenie_id()
 * @method string get_czlowiek_id()
 * @method string get_debata_id()
 * @method string get_dzien_sejmowy_id()
 * @method string get_ilosc_slow()
 * @method string get_klub_id()
 * @method string get_kolejnosc()
 * @method string get_punkt_id()
 * @method string get_skrot()
 * @method string get_stanowisko_id()
 * @method string get_video()
 * @method string get_tytul()
 */
class ep_Sejm_Wystapienie extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'data' => ep_Object::TYPE_STRING,
			'posiedzenie_id' => ep_Object::TYPE_STRING,
			'czlowiek_id' => ep_Object::TYPE_STRING,
			'debata_id' => ep_Object::TYPE_STRING,
			'dzien_sejmowy_id' => ep_Object::TYPE_STRING,
			'ilosc_slow' => ep_Object::TYPE_STRING,
			'klub_id' => ep_Object::TYPE_STRING,
			'kolejnosc' => ep_Object::TYPE_STRING,
			'punkt_id' => ep_Object::TYPE_STRING,
			'skrot' => ep_Object::TYPE_STRING,
			'stanowisko_id' => ep_Object::TYPE_STRING,
			'video' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('sejm_wystapienia', 'sejm_posiedzenia_dni');

	
	/**
	 * @var string
	 */
	public function getDate(){
		return $this->data['data'];
	}
	
	/**
	 * @var string
	 */
	public function getTitle(){
		return $this->data['skrot'];
	}
}
