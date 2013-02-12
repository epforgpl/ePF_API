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
			'ep_Api' => 'ep_Api.php',
			'ep_Autoloader' => 'ep_Autoloader.php',
			'ep_Dataset' => 'ep_Dataset.php',
			'ep_Object' => 'ep_Object.php',
			'ep_Search' => 'ep_Search.php',
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
		if (isset($this->classMap[$class])) {
			if (!@include_once($this->classMap[$class])) {
				return false;
			}
		} else {
			if (!@include_once('objects/'.$class.'.php')) {
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