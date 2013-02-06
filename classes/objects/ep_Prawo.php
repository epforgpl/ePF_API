<?php
class ep_Prawo extends ep_Object{

	public $_aliases = array('prawo');
	public $_field_init_lookup = 'tytul';

	public function getDescription(){
		return $this->data ? $this->data['sygnatura'] : false;
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}