<?php
namespace Block\Patient\Layout;
\Mage::loadFileByClassName('Block\Core\Template');
class Content extends \Block\Core\Template
{
	public function __construct()
	{
		$this->setTemplate('patient/layout/content.php');
	}
}