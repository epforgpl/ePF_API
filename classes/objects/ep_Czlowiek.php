<?php
class ep_Czlowiek extends ep_Object{

	public $_aliases = array('ludzie');
	public $_field_init_lookup = 'nazwa';
	private $_stanowiska = false;

	public function stanowiska(){
		if( !$this->_stanowiska ) {

			$this->_stanowiska = new ep_Dataset('stanowiska');
			$this->_stanowiska->init_where('ludzie.id', '=', $this->id);
		}
		return $this->_stanowiska;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}