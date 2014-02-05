<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */

/**
 * Obiekt ep_BDL_Podgrupa.
 *
 * Aliasy:
 *   bdl_wskazniki_podgrupy
 *
 * Przykładowe zastosowanie:
 * <code>
 * 	 $searcher = new ep_Search();
 *	 $searcher->setDataset('bdl_wskazniki_podgrupy')->load();
 *
 *   $objects = $searcher->getObjects();
 *   $pagination = $searcher->getPagination();
 * </code>
 *
 * Dostępne dodatkowe warstwy danych:
 * wskazniki
 * dane_lokalne
 * redirect_id
 *
 * Przykład:
 * <code>
 * 	 $data = $object->load_layer('wskazniki');
 * </code>
 *
 * @example objects/ep_BDL_Podgrupa
 *
 * @see ep_BDL_Kategoria::$_aliases
 *
 * @category   System
 * @package    ePF_API
 * @subpackage Objects
 * @version    0.x.x-dev
 * @since      version 0.1.0
 * 
 * @method int get_id()
 * @method string get_archiwum()
 * @method string get_grupa_id()
 * @method string get_kategoria_id()
 * @method string get_okres()
 * @method string get_slug()
 * @method string get_tytul()
 */
class ep_BDL_Podgrupa extends ep_Object{

	/**
	 * @see ep_Object::getDataStruct()
	 */
	public function getDataStruct() {
		$result = parent::getDataStruct();
		$result = array_merge($result, array (
			'archiwum' => ep_Object::TYPE_STRING,
			'grupa_id' => ep_Object::TYPE_STRING,
			'kategoria_id' => ep_Object::TYPE_STRING,
			'okres' => ep_Object::TYPE_STRING,
			'slug' => ep_Object::TYPE_STRING,
			'tytul' => ep_Object::TYPE_STRING,
		));
		return $result;
	}

	/**
	 * @var array
	 */
	public $_aliases = array('bdl_wskazniki_podgrupy');

	/**
	 * @return string
	 */
    public function getLabel(){
	   return '<b>Wskaźniki</b> Banku Danych Lokalnych';
	}

	/**
	 * @return ep_BDL_Grupa
	 */	
	public function grupa(){		
		if( $this->data['grupa_id'] ){
			return new ep_BDL_Grupa( $this->data['grupa_id'] );					
		}
	}

	/**
	 * @return ep_BDL_Kategoria
	 */	
	public function kategoria(){		
		if( $this->data['kategoria_id'] ){
			return new ep_BDL_Kategoria( $this->data['kategoria_id'] );
		}			
	}
}
