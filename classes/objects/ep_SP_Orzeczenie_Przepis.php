<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_SP_Orzeczenie_Przepis.
 *
 * Aliasy:
 *   sp_przepisy
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('sp_przepisy');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_SP_Orzeczenie_Przepis
 *
 * @see ep_SP_Orzeczenie_Przepis::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_SP_Orzeczenie_Przepis extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'lp' => ep_Object::TYPE_INT,
			'orzeczenie_sp_id' => ep_Object::TYPE_INT,
			'przepis' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	public $_aliases = array( 'sp_przepisy' );

	/**
	 * @var ep_Orzeczenie_sp
	 */
	protected $_orzeczenie_sp = null;

	/**
	 * @return string
	 */
	public function __toString(){
		return (string) $this->get_przepis();
	}

	/**
	 * @return ep_SP_Orzeczenie
	 */
	public function orzeczenie_sp(){
		if( !$this->_orzeczenie_sp ) {
			$this->_orzeczenie_sp = new ep_SP_Orzeczenie( $this->get_orzeczenie_sp_id() );
		}
		return $this->_orzeczenie_sp;
	}
}
