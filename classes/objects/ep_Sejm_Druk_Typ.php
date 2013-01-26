<?php
class ep_Sejm_Druk_Typ extends ep_Object{

	public $_aliases = array('sejm_druki_typy');
	public $_field_init_lookup = 'nazwa';
	private $_druki = false;

	public function druki(){
		if( !$this->_druki ) {

			$this->_druki = new ep_Dataset('sejm_druki');
			$this->_druki->init_where('sejm_druki.typ_id', '=', $this->id);
		}
		return $this->_druki;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}