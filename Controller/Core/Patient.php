<?php
namespace Controller\Core;
\Mage::loadFileByClassName('Controller\Core\Abstracts');
class Patient extends Abstracts
{
	public function setMessage(){
		$this->message = \Mage::getModel('Patient\Message');
		return $this;
	}
	
	public function setLayout(\Block\Core\Layout $layout = null){
		if(!$layout){
			$layout = \Mage::getBlock('Patient\Layout');
		}
		$this->layout = $layout;
		return $this;
	}
}