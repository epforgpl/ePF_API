<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Sejm_Klub.
 *
 * Aliasy:
 *   sejm_kluby
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('sejm_kluby')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 * @example objects/ep_Sejm_Klub
 *
 * @see ep_Sejm_Klub::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_nazwa()
 * @method string get_liczba_kobiet()
 * @method string get_liczba_mezczyzn()
 * @method string get_liczba_poslow()
 * @method string get_skrot()
 * @method string get_srednia_frekfencja()
 * @method string get_srednia_liczba_projektow_uchwal()
 * @method string get_srednia_liczba_projektow_ustaw()
 * @method string get_srednia_liczba_wnioskow()
 * @method string get_srednia_liczba_wystapien()
 * @method string get_srednia_poparcie_w_okregu()
 * @method string get_srednia_udzial_w_obradach()
 * @method string get_srednia_zbuntowanie()
 */
class ep_Sejm_Klub extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'nazwa' => ep_Object::TYPE_STRING,
			'liczba_kobiet' => ep_Object::TYPE_STRING,
			'liczba_mezczyzn' => ep_Object::TYPE_STRING,
			'liczba_poslow' => ep_Object::TYPE_STRING,
			'skrot' => ep_Object::TYPE_STRING,
			'srednia_frekfencja' => ep_Object::TYPE_STRING,
			'srednia_liczba_projektow_uchwal' => ep_Object::TYPE_STRING,
			'srednia_liczba_projektow_ustaw' => ep_Object::TYPE_STRING,
			'srednia_liczba_wnioskow' => ep_Object::TYPE_STRING,
			'srednia_liczba_wystapien' => ep_Object::TYPE_STRING,
			'srednia_poparcie_w_okregu' => ep_Object::TYPE_STRING,
			'srednia_udzial_w_obradach' => ep_Object::TYPE_STRING,
			'srednia_zbuntowanie' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('sejm_kluby');

}
