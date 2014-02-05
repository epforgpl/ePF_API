<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Posiedzenie_Punkt.
 *
 * Aliasy:
 *   sejm_posiedzenia_punkty
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('sejm_posiedzenia_punkty')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 *
 * @example objects/ep_Sejm_Posiedzenie_Punkt
 *
 * @see ep_Sejm_Posiedzenie_Punkt::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_kolejnosc()
 * @method string get_liczba_debat()
 * @method string get_liczba_glosowan()
 * @method string get_liczba_slow()
 * @method string get_liczba_wystapien()
 * @method string get_numer()
 * @method string get_numer_int()
 * @method string get_posiedzenie_id()
 * @method string get_promo_wystapienie_id()
 * @method string get_stats_str()
 * @method string get_tytul()
 * @method string get_video()
 */
class ep_Sejm_Posiedzenie_Punkt extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'kolejnosc' => ep_Object::TYPE_STRING,
			'liczba_debat' => ep_Object::TYPE_STRING,
			'liczba_glosowan' => ep_Object::TYPE_STRING,
			'liczba_slow' => ep_Object::TYPE_STRING,
			'liczba_wystapien' => ep_Object::TYPE_STRING,
			'numer' => ep_Object::TYPE_STRING,
			'numer_int' => ep_Object::TYPE_STRING,
			'posiedzenie_id' => ep_Object::TYPE_STRING,
			'promo_wystapienie_id' => ep_Object::TYPE_STRING,
			'stats_str' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'video' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('sejm_posiedzenia_punkty');

	/**
	 * @var array
	 */
	public function search(){
		
		$search = new ep_Search();
		$search->addRawFilter('( (dataset:sejm_wystapienia AND _data_punkt_id:"' . $this->data['id'] . '") OR (dataset:sejm_glosowania AND _data_punkt_id:"' . $this->data['id'] . '") )');
		return $search;
		
	}
}
