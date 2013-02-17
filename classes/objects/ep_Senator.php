<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Senator.
 *
 * Aliasy:
 *   senatorowie
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('senatorowie');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Senator
 *
 * @see ep_Senator::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Senator extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'mowca_id' => ep_Object::TYPE_INT,
			'nazwa' => ep_Object::TYPE_STRING,
			'email' => ep_Object::TYPE_STRING,
			'opis' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array('senatorowie');
	public $_field_init_lookup = 'nazwa';

	private $_komisje = false;
	private $_zespoly_parlamentarne = false;
	private $_zespoly_senackie = false;
	private $_oswiadczenia_majatkowe = false;
	private $_rejestr_korzysci = false;
	private $_wystapienia = false;

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}

	public function komisje(){
		if( !$this->_komisje ) {
			$this->_komisje = new ep_Dataset('senat_senatorowie_komisje');
			$this->_komisje->init_where('senator_id', '=', $this->id);
		}
		return $this->_komisje;
	}

	public function zespoly_parlamentarne(){
		if( !$this->_zespoly_parlamentarne ) {
			$this->_zespoly_parlamentarne = new ep_Dataset('senat_senatorowie_zespoly_parlamentarne');
			$this->_zespoly_parlamentarne->init_where('senator_id', '=', $this->id);
		}
		return $this->_zespoly_parlamentarne;
	}

	public function zespoly_senackie(){
		if( !$this->_zespoly_senackie ) {
			$this->_zespoly_senackie = new ep_Dataset('senat_senatorowie_zespoly_senackie');
			$this->_zespoly_senackie->init_where('senator_id', '=', $this->id);
		}
		return $this->_zespoly_senackie;
	}

	public function oswiadczenia_majatkowe(){
		if( !$this->_oswiadczenia_majatkowe ) {
			$this->_oswiadczenia_majatkowe = new ep_Dataset('senatorowie_oswiadczenia_majatkowe');
			$this->_oswiadczenia_majatkowe->init_where('senator_id', '=', $this->id);
		}
		return $this->_oswiadczenia_majatkowe;
	}

	public function rejestr_korzysci(){
		if( !$this->_rejestr_korzysci ) {
			$this->_rejestr_korzysci = new ep_Dataset('senat_rejestr_korzysci');
			$this->_rejestr_korzysci->init_where('senator_id', '=', $this->id);
		}
		return $this->_rejestr_korzysci;
	}

	public function wystapienia(){
		if( !$this->_wystapienia ){
			$this->_wystapienia = new ep_Dataset('senat_wystapienia');
			$this->_wystapienia->init_where('mowca_id', '=', $this->get_mowca_id());
		}
		return $this->_wystapienia;
	}
}
