<?php
class ep_Senat_komisja extends ep_Object{

	public $_aliases = array('senat_komisje');
	public $_field_init_lookup = 'nazwa';

	/**
	 * @return string
	 */
	public function get_nazwa(){
		return (string)$this->data['nazwa'];
	}

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}