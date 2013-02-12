<?php
class ep_Sejm_Interpelacja_Pismo extends ep_Object{

	public $_aliases = array('sejm_interpelacje_pisma');

	/**
	 * @return string
	 */
	public function __toString(){
		return $this->get_nazwa();
	}
}