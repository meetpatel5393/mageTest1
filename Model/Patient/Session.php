<?php 
namespace Model\Patient;
\Mage::loadFileByClassName('Model\Core\Session');
class Session extends \Model\Core\Session
{
	public function __construct(){
		parent::__construct();
		$this->setNameSpace('Patient');
	}
}

?>