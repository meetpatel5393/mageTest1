<?php
namespace Block\Patient\Layout;
class Message extends \Block\Core\Template
{
	public function __construct()
	{
		$this->setTemplate('Patient/layout/message.php');
		$this->setMessage();
	}

	public function setMessage(){
		$this->message = \Mage::getModel('Patient\Message');
		return $this;
	}
}