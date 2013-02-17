<?php

/**
 * @file
 * Ten plik jest częścią biblioteki ePF_API.
 */
 
/**
 * Autoloader of ep_API classes. Uses SPL autoloader.
 *
 * @category   API
 * @package    ePF_API
 * @subpackage Core
 * @author     Paweł Sroka 'Srokap' https://github.com/Srokap
 * @version    0.x.x-dev
 * @since      version 0.1.0 
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
			'ep_Api' => 'ep_Api.php',
			'ep_Autoloader' => 'ep_Autoloader.php',
			'ep_Dataset' => 'ep_Dataset.php',
			'ep_Object' => 'ep_Object.php',
			'ep_Search' => 'ep_Search.php',
		);
	}
	
	/**
	 * @param string $dir directory path to generate class map from
	 * @return array:array list of 3 associative arrays containing all mappings, correct mappings and bad files respectively
	 */
	private function getClassMap($dir) {
		$flags = RecursiveDirectoryIterator::KEY_AS_FILENAME 
			| RecursiveDirectoryIterator::SKIP_DOTS 
			| RecursiveDirectoryIterator::UNIX_PATHS;
		$files = new RecursiveDirectoryIterator($dir, $flags);
		$files = new RecursiveIteratorIterator($files, RecursiveIteratorIterator::LEAVES_ONLY);
		
		//use only *.php files (eg. for filter .dot.files)
		$files = new RegexIterator($files, '/^.+\.php$/i', RegexIterator::MATCH);
		
		//use class name (without .php extension) as key
		$files = new RegexIterator($files, '/(\.php)$/i', RegexIterator::REPLACE, RegexIterator::USE_KEY);
		$files->rewind();
		
		$map = array();
		$map_correct = array();
		$regExp = '/class\s+([a-zA-Z0-9_]*)\s/i';
		
		//iterate over files
		foreach ($files as $key => $fileInfo) {
			$map[$key] = $files->getSubPathName();
				
			$file = new SplFileObject($fileInfo->getRealPath());
			$m = new RegexIterator($file, $regExp, RegexIterator::MATCH);
			$class_matches = iterator_to_array($m, false);

			if (empty($class_matches)) {
				trigger_error("No class found in file ". $fileInfo->getRealPath(), E_USER_WARNING);
			} else {
				$map_correct[$key] = $map[$key];
			}
		}
		//error's map
		$map_invalid = array_diff($map, $map_correct);
		
		return array($map, $map_correct, $map_invalid);
	}
	
	/**
	 * Generate and output (SPL'ish) classmap for autoloader
	 *
	 * @param bool $return If true, returns PHP code instead of outputting it. Default: false
	 * @return string
	 */
	public function regenerateClassMap($return = false) {
		
		list($map_all, $map_oks, $map_bad) = $this->getClassMap(__DIR__);
		
		$result = 'return '.str_replace('  ', "\t", var_export($map_oks, true)).';';
		
		if ($return) {
			return $result;
		} else {
			echo '<pre>';
			echo $result;
			echo '</pre>';
		}
	}
	
	/**
	 * @return array full paths to files containing object classes
	 */
	public function getAllObjectClassPaths() {
		$basePath = dirname(__FILE__).'/objects/';
		$files = scandir($basePath);
		foreach ($files as $key => $file) {
			if ($file[0]=='.' || !is_file($basePath.$file)) {
				unset($files[$key]);
			} else {
				$files[$key] = $basePath.$file;
			}
		}
		return $files;
	}
	
	/**
	 * @return array all object classes names
	 */
	public function getAllObjectClassNames() {
		$files = $this->getAllObjectClassPaths();
		foreach ($files as $key => $file) {
			$files[$key] = basename($file, '.php');
		}
		return $files;
	}
	
	/**
	 * Autoload callback to be registered with spl_autoload_register
	 * @param string $class
	 * @return boolean
	 */
	public function autoload($class) {
		if (isset($this->classMap[$class])) {
			if (!@include_once($this->classMap[$class])) {
				return false;
			}
		} else {
			$path = dirname(__FILE__).'/objects/'.$class.'.php';
			if (!file_exists($path)) {
				return false;
			}
			if (!@include_once($path)) {
				return false;
			}
		}
	}
	
	/**
	 * Registers this instance of ep_Autoloader in spl autoloader
	 */
	public function register() {
		spl_autoload_register(array($this, 'autoload'));
	}
}
