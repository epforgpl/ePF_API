<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_Prawo.
 *
 * Aliasy:
 *   prawo
 *
 * Przykładowe zastosowanie:
 * <code>
 *   $dataset = new ep_Dataset('prawo');
 *   $data = $dataset->find_all();
 * </code>
 * @example objects/ep_Prawo
 *
 * @see ep_Prawo::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 */
class ep_Prawo extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'autor_id' => ep_Object::TYPE_STRING,
			'autor_nazwa' => ep_Object::TYPE_STRING,
			'data_publikacji' => ep_Object::TYPE_STRING,
			'data_wejscia_w_zycie' => ep_Object::TYPE_STRING,
			'data_wydania' => ep_Object::TYPE_STRING,
			'dokument_id' => ep_Object::TYPE_STRING,
			'isap_data_obowiazywania' => ep_Object::TYPE_STRING,
			'isap_data_ogloszenia' => ep_Object::TYPE_STRING,
			'isap_data_uchylenia' => ep_Object::TYPE_STRING,
			'isap_data_wejscia_w_zycie' => ep_Object::TYPE_STRING,
			'isap_data_wydania' => ep_Object::TYPE_STRING,
			'isap_data_wygasniecia' => ep_Object::TYPE_STRING,
			'isap_id' => ep_Object::TYPE_STRING,
			'isap_organ_uprawniony_str' => ep_Object::TYPE_STRING,
			'isap_organ_wydajacy_str' => ep_Object::TYPE_STRING,
			'isap_organ_zobowiazany_str' => ep_Object::TYPE_STRING,
			'isap_plik_dokument_id' => ep_Object::TYPE_STRING,
			'isap_plik_id' => ep_Object::TYPE_STRING,
			'isap_status_str' => ep_Object::TYPE_STRING,
			'isap_uwagi_str' => ep_Object::TYPE_STRING,
			'label' => ep_Object::TYPE_STRING,
			'label_html' => ep_Object::TYPE_STRING,
			'liczba_zalacznikow' => ep_Object::TYPE_STRING,
			'nr' => ep_Object::TYPE_STRING,
			'poz' => ep_Object::TYPE_STRING,
			'rok' => ep_Object::TYPE_STRING,
			'status_id' => ep_Object::TYPE_STRING,
			'sygnatura' => ep_Object::TYPE_STRING,
			'typ_id' => ep_Object::TYPE_STRING,
			'typ_nazwa' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
			'tytul_skrocony' => ep_Object::TYPE_STRING,
			'zrodlo' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

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
