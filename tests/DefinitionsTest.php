<?php
class DefinitionsTest extends PHPUnit_Framework_TestCase {
	
	private function getDatalists() {
		static $list;
		if ($list!==null) {
			return $list;
		}
		$list = array();
		$limit = 50;
		$offset = 0;
		$dataset = new ep_Dataset('_datasets');
		while (1) {
			$result = $dataset->find_all($limit, $offset, true);
			if (!is_array($result)) {
				$this->fail("Error while fetching _datasets for LIMIT $limit OFFSET $offset");
			}
			if (count($result)==0) {
				break;
			}
			$list = array_merge((array)$list, (array)$result);
			$offset += $limit;
		}
		foreach ($list as $item) {
			$this->assertInstanceOf('ep__Dataset', $item);
		}
		return $list;
	}
	
	/**
	 * Verifies that all classes defined in _datasets call are availible locally.
	 */
	function testClassesExist() {
		/**
		 * Aktualnie brakujące klasy (24.02.2013)
		 * @var array
		 */
		$exceptions = array(
			'ep_Wybory_Samorzadowe_Okreg',
			'ep_Wybory_Samorzadowe_Szczebel',
			'ep_Wybory_Samorzadowe_Rady_Kandydat',
			'ep_Pismo',
			'ep_Pismo_Status',
			'ep_Pismo_Adresat',
			'ep_Pismo_Szablon',
			'ep_Pismo_Szablon_Kategoria',
			'ep_Posel_Aktywnosc',
			'ep_Projekt_Etap_Typ',
			'ep_Legislacja_Faza',
			'ep_Rozporzadzenie',
			'ep_Switch_A',
		);
		$list = $this->getDatalists();
		//$this->assertEquals(111, count($list));//silly one, don't use
		foreach ($list as $item) {
			$className = $item->get_results_class();
			$this->assertNotEmpty($className);
			if (in_array($className, $exceptions)) {
				continue;
			}
			$this->assertTrue(class_exists($className), 'Missing class definition: '.$className);
			$this->assertTrue(is_subclass_of($className, 'ep_Object'), $className.' does not inherit from ep_Object');
		}
	}
	
	function testClassesNotUsed() {
		$exceptions = array();
		/**
		 * Aktualnie nadmiarowe klasy (24.02.2013)
		 * @var array
		 */
		$exceptions = array(
			'ep_KRS_Wpis',
			'ep_Orzeczenie_sp_osoba_stanowisko',
		);
		$al = new ep_Autoloader();
		$list = $this->getDatalists();
		$list = array_map(function($item){
			return $item->get_results_class();
		}, $list);
		$result = array_diff($al->getAllObjectClassNames(), $list, $exceptions);
		$this->assertEquals(0, count($result), 'Unused class definitions: '.print_r($result, true));
	}
	
}