<?php
/**
 * Autoloader of ep_API classes. Uses spl autoloader.
 */
class ep_Autoloader {
	
	/**
	 * @var array Autoloader class map with class names as keys and paths to the files as values 
	 */
	private $classMap = array();
	
	public function __construct() {
		$this->classMap = $this->getDefaultMap();
	}
	
	/**
	 * @return array Autoloader class map with class names as keys and paths to the files as values 
	 */
	public function getMap() {
		return $this->classMap;
	}
	
	/**
	 * Default classes expected in eP_API. We map them manually since some of the classes 
	 * have different name and file name.
	 * @return array Autoloader class map with class names as keys and paths to the files as values 
	 */
	protected function getDefaultMap() {
		return array (
			'ep_Api' => 'ep_API.php',
			'ep_Autoloader' => 'ep_Autoloader.php',
			'ep_Dataset' => 'ep_Dataset.php',
			'ep_Object' => 'ep_Object.php',
			'ep_Search' => 'ep_Search.php',
			'ep_NIK_Raport' => 'objects/_ep_NIK_raport.php',
			'ep_BDL_Podgrupa' => 'objects/ep_BDL_Grupa.php',
			'ep_BDL_Kategoria' => 'objects/ep_BDL_Kategoria.php',
			'ep_BDL_Grupa' => 'objects/ep_BDL_Podgrupa.php',
			'ep_BDL_Wskaznik_Wariacja' => 'objects/ep_BDL_Wskaznik_Wariacja.php',
			'ep_Bip_Instytucja' => 'objects/ep_Bip_Instytucja.php',
			'ep_Czlowiek' => 'objects/ep_Czlowiek.php',
			'ep_Glosowanie_Sejmowe_Glos' => 'objects/ep_Glosowanie_Sejmowe_Glos.php',
			'ep_Gmina' => 'objects/ep_Gmina.php',
			'ep_ISAP_Plik' => 'objects/ep_ISAP_Plik.php',
			'ep_Instytucja' => 'objects/ep_Instytucja.php',
			'ep_KRS_Wpis' => 'objects/ep_KRS_Wpis.php',
			'ep_Kod_Pocztowy' => 'objects/ep_Kod_Pocztowy.php',
			'ep_Legislacja_Projekt' => 'objects/ep_Legislacja_Projekt.php',
			'ep_Legislacja_Projekt_Etap' => 'objects/ep_Legislacja_Projekt_Etap.php',
			'ep_Legislacja_Projekt_Podpis' => 'objects/ep_Legislacja_Projekt_Podpis.php',
			'ep_Legislacja_Projekt_Status' => 'objects/ep_Legislacja_Projekt_Status.php',
			'ep_Miejscowosc' => 'objects/ep_Miejscowosc.php',
			'ep_NIK_raport' => 'objects/ep_NIK_Raport.php',
			'ep_Orzeczenie_sp_osoba_stanowisko' => 'objects/ep_Orzeczenie_sp_osoba_stanowisko.php',
			'ep_PNA' => 'objects/ep_PNA.php',
			'ep_Posel' => 'objects/ep_Posel.php',
			'ep_Posel_Aktywnosc' => 'objects/ep_Posel_Aktywnosc.php',
			'ep_Posel_Glos' => 'objects/ep_Posel_Glos.php',
			'ep_Posel_Komisja_Stanowisko' => 'objects/ep_Posel_Komisja_Stanowisko.php',
			'ep_Posel_Oswiadczenie_Majatkowe' => 'objects/ep_Posel_Oswiadczenie_Majatkowe.php',
			'ep_Posel_Rejestr_Korzysci' => 'objects/ep_Posel_Rejestr_Korzysci.php',
			'ep_Posel_Wspolpracownik' => 'objects/ep_Posel_Wspolpracownik.php',
			'ep_Powiat' => 'objects/ep_Powiat.php',
			'ep_Prawo' => 'objects/ep_Prawo.php',
			'ep_Prawo_Typ' => 'objects/ep_Prawo_Typ.php',
			'ep_RCL_Dokument' => 'objects/ep_RCL_Dokument.php',
			'ep_RCL_Projekt' => 'objects/ep_RCL_Projekt.php',
			'ep_RCL_Projekt_Etap' => 'objects/ep_RCL_Projekt_Etap.php',
			'ep_RCL_Projekt_Status' => 'objects/ep_RCL_Projekt_Status.php',
			'ep_SA_Orzeczenie' => 'objects/ep_SA_Orzeczenie.php',
			'ep_SA_Orzeczenie_Wynik' => 'objects/ep_SA_Orzeczenie_Wynik.php',
			'ep_SA_Sad' => 'objects/ep_SA_Sad.php',
			'ep_SA_Sedzia' => 'objects/ep_SA_Sedzia.php',
			'ep_SA_Skarzony_Organ' => 'objects/ep_SA_Skarzony_Organ.php',
			'ep_SN_Izba' => 'objects/ep_SN_Izba.php',
			'ep_SN_Jednostka' => 'objects/ep_SN_Jednostka.php',
			'ep_SN_Orzeczenie' => 'objects/ep_SN_Orzeczenie.php',
			'ep_SN_Orzeczenie_Autor' => 'objects/ep_SN_Orzeczenie_Autor.php',
			'ep_SN_Orzeczenie_Forma' => 'objects/ep_SN_Orzeczenie_Forma.php',
			'ep_SN_Orzeczenie_Izba' => 'objects/ep_SN_Orzeczenie_Izba.php',
			'ep_SN_Orzeczenie_Sedzia' => 'objects/ep_SN_Orzeczenie_Sedzia.php',
			'ep_SN_Osoba' => 'objects/ep_SN_Osoba.php',
			'ep_SN_Sklad' => 'objects/ep_SN_Sklad.php',
			'ep_SN_Wspolsprawozdawca' => 'objects/ep_SN_Wspolsprawozdawca.php',
			'ep_SP_Haslo' => 'objects/ep_SP_Haslo.php',
			'ep_SP_Haslo_Tematyczne' => 'objects/ep_SP_Haslo_Tematyczne.php',
			'ep_SP_Orzeczenie' => 'objects/ep_SP_Orzeczenie.php',
			'ep_SP_Orzeczenie_Czesc' => 'objects/ep_SP_Orzeczenie_Czesc.php',
			'ep_SP_Orzeczenie_Przepis' => 'objects/ep_SP_Orzeczenie_Przepis.php',
			'ep_SP_Osoba' => 'objects/ep_SP_Osoba.php',
			'ep_SP_Sad' => 'objects/ep_SP_Sad.php',
			'ep_SP_Stanowisko' => 'objects/ep_SP_Stanowisko.php',
			'ep_SP_Teza' => 'objects/ep_SP_Teza.php',
			'ep_Sejm_Dezyderat' => 'objects/ep_Sejm_Dezyderat.php',
			'ep_Sejm_Druk' => 'objects/ep_Sejm_Druk.php',
			'ep_Sejm_Druk_Typ' => 'objects/ep_Sejm_Druk_Typ.php',
			'ep_Sejm_Dzien' => 'objects/ep_Sejm_Dzien.php',
			'ep_Sejm_Glosowanie' => 'objects/ep_Sejm_Glosowanie.php',
			'ep_Sejm_Glosowanie_Glos' => 'objects/ep_Sejm_Glosowanie_Glos.php',
			'ep_Sejm_Glosowanie_Typ' => 'objects/ep_Sejm_Glosowanie_Typ.php',
			'ep_Sejm_Interpelacja' => 'objects/ep_Sejm_Interpelacja.php',
			'ep_Sejm_Interpelacja_Pismo' => 'objects/ep_Sejm_Interpelacja_Pismo.php',
			'ep_Sejm_Klub' => 'objects/ep_Sejm_Klub.php',
			'ep_Sejm_Komisja' => 'objects/ep_Sejm_Komisja.php',
			'ep_Sejm_Komunikat' => 'objects/ep_Sejm_Komunikat.php',
			'ep_Sejm_Okreg_Wyborczy' => 'objects/ep_Sejm_Okreg_Wyborczy.php',
			'ep_Sejm_Posiedzenie' => 'objects/ep_Sejm_Posiedzenie.php',
			'ep_Sejm_Posiedzenie_Debata' => 'objects/ep_Sejm_Posiedzenie_Debata.php',
			'ep_Sejm_Posiedzenie_Punkt' => 'objects/ep_Sejm_Posiedzenie_Punkt.php',
			'ep_Sejm_Pytanie_Biezace' => 'objects/ep_Sejm_Pytanie_Biezace.php',
			'ep_Sejm_Sprawozdanie' => 'objects/ep_Sejm_Sprawozdanie.php',
			'ep_Sejm_Wniesiony_Projekt' => 'objects/ep_Sejm_Wniesiony_Projekt.php',
			'ep_Sejm_Wystapienie' => 'objects/ep_Sejm_Wystapienie.php',
			'ep_Senat_Druk' => 'objects/ep_Senat_Druk.php',
			'ep_Senat_Oswiadczenie_Majatkowe' => 'objects/ep_Senat_Oswiadczenie_Majatkowe.php',
			'ep_Senat_Wystapienie' => 'objects/ep_Senat_Wystapienie.php',
			'ep_Senat_Zespol' => 'objects/ep_Senat_Zespol.php',
			'ep_Senat_komisja' => 'objects/ep_Senat_komisja.php',
			'ep_Senat_rejestr_korzysci' => 'objects/ep_Senat_rejestr_korzysci.php',
			'ep_Senat_senator_komisja' => 'objects/ep_Senat_senator_komisja.php',
			'ep_Senat_senator_zespol_parlamentarny' => 'objects/ep_Senat_senator_zespol_parlamentarny.php',
			'ep_Senat_senator_zespol_senacki' => 'objects/ep_Senat_senator_zespol_senacki.php',
			'ep_Senat_zespol_parlamentarny' => 'objects/ep_Senat_zespol_parlamentarny.php',
			'ep_Senator' => 'objects/ep_Senator.php',
			'ep_Stanowisko' => 'objects/ep_Stanowisko.php',
			'ep_Twitt' => 'objects/ep_Twitt.php',
			'ep_Twitt_Tag' => 'objects/ep_Twitt_Tag.php',
			'ep_Ustawa' => 'objects/ep_Ustawa.php',
			'ep_Wojewodztwo' => 'objects/ep_Wojewodztwo.php',
			'ep__Dataset' => 'objects/ep__Dataset.php',
			'ep__Object' => 'objects/ep__Object.php',
			'sp_Orzeczenie_SN_Sprawozdawca' => 'objects/sp_Orzeczenie_SN_Sprawozdawca.php',
		);
	}
	
	/**
	 * Generate and output classmap for autoloader
	 * @param bool $return If true, returns PHP code instead of outputting it. Default: false
	 * @return string
	 */
	public function regenerateClassMap($return = false) {
		$base = __DIR__;
		$result = array();
		$files = scandir($base);
		foreach ($files as $file) {
			if ($file[0]=='.') {
				continue;
			}
			$path = $base.'/'.$file;
			if (is_dir($path)) {
				$subFiles = scandir($path);
				foreach ($subFiles as $subFile) {
					if ($subFile[0]=='.') {
						continue;
					}
					$path2 = $file.'/'.$subFile;
					$result[] = $path2;
				}
			} else {
				$result[] = $file;
			}
		}
		$map = array();
		foreach ($result as $path) {
			$lines = file($base.'/'.$path);
			$i = 0;
			$regExp = '/class\s+([a-zA-Z0-9_]*)\s/i';
			while (!preg_match($regExp, $lines[$i], $matches)) {
				$i++;
			}
			if (preg_match($regExp, $lines[$i], $matches)) {
				$map[$matches[1]] = $path;
			} else {
				trigger_error("No class found in file ".$path, E_USER_WARNING);
			}
		}
		$result = 'return '.str_replace('  ', "\t", var_export($map, true)).';';
		if ($return) {
			return $result;
		} else {
			echo '<pre>';
			echo $result;
			echo '</pre>';
		}
	}
	
	/**
	 * Autoload callback to be registered with spl_autoload_register
	 * @param string $class
	 * @return boolean
	 */
	public function autoload($class) {
		if (!isset($this->classMap[$class]) || !@include_once($this->classMap[$class])) {
			return false;
		}
	}
	
	/**
	 * Registers this instance of ep_Autoloader in spl autoloader
	 */
	public function register() {
		spl_autoload_register(array($this, 'autoload'));
	}
}