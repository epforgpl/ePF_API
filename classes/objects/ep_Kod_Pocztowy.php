<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Kod_Pocztowy.
 *
 * Aliasy:
 *   kody_pocztowe
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('kody_pocztowe')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 *
 * Dostępne dodatkowe warstwy danych:
 * obszary
 *
 * Przykład:
 * <code>
 * 	 $data = $object->load_layer('obszary');
 * </code>
 *
 * @example objects/ep_Kod_Pocztowy
 *
 * @see ep_Kod_Pocztowy::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_kod()
 * @method int get_kod_int()
 * @method int get_wojewodztwo_id()
 * @method string get_gminy()
 * @method string get_liczba_gmin()
 * @method string get_liczba_powiatow()
 * @method string get_miejscowosci_str()
 * @method string get_wojewodztwo()
 */
class ep_Kod_Pocztowy extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'kod' => ep_Object::TYPE_STRING,
			'kod_int' => ep_Object::TYPE_INT,
			'wojewodztwo_id' => ep_Object::TYPE_INT,
			'gminy' => ep_Object::TYPE_STRING,
			'liczba_gmin' => ep_Object::TYPE_STRING,
			'liczba_powiatow' => ep_Object::TYPE_STRING,
			'miejscowosci_str' => ep_Object::TYPE_STRING,
			'wojewodztwo' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('kody_pocztowe');
	
	/**
	 * @return string
	 */		
	public function getLabel(){
		return '<b>Kod pocztowy</b>';
	}
}
