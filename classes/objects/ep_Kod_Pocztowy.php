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
 *   $dataset = new ep_Dataset('kody_pocztowe');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Kod_Pocztowy
 *
 * @see ep_Kod_Pocztowy::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
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

	public $_aliases = array('kody_pocztowe');
	public $_field_init_lookup = 'kod';

	private $_gminy = false;

	public function gminy(){
		if( !$this->_gminy ) {

			$this->_gminy = new ep_Dataset('gminy');
			$this->_gminy->init_where('kody_pocztowe_gminy.kod_id', '=', $this->data['id'])->order_by('typ_id', 'ASC');
		}
		return $this->_gminy;
	}

	/**
	 * @var ep_Wojewodztwo
	 */
	protected $_wojewodztwo = null;

	/**
	 * @return ep_Wojewodztwo
	 */
	public function wojewodztwo(){
		if( !$this->_wojewodztwo ) {
			$this->_wojewodztwo = new ep_Wojewodztwo( $this->get_wojewodztwo_id() );
		}
		return $this->_wojewodztwo;
	}
}
