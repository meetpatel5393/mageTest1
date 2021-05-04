<?php
namespace Block\Patient;
\Mage::loadFileByClassName('Block\Core\Layout');
class Layout extends \Block\Core\Layout
{
	public function __construct()
	{	
		$this->setTemplate('patient/layout/oneColumn.php');
		$this->prepareChildren();
	}
	
	public function prepareChildren()
	{
		$this->addChild(\Mage::getBlock('Patient\Layout\Head'), 'head');
		$this->addChild(\Mage::getBlock('Patient\Layout\Header'), 'header');
		$this->addChild(\Mage::getBlock('Patient\Layout\Footer'), 'footer');
		$this->addChild(\Mage::getBlock('Patient\Layout\Message'), 'message');
		$this->addChild(\Mage::getBlock('Patient\Layout\Content'), 'content');
		$this->addChild(\Mage::getBlock('Patient\Layout\Left'), 'left');
	}
}