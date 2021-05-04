<?php 
namespace Model\Patient;
\Mage::loadFileByClassName('Model\Patient\Session');
\Mage::loadFileByClassName('Model\Core\Message\Trait');
class Message extends \Model\Patient\Session
{
	use \Model\Core\Message\Message;
	public function __construct(){
		parent::__construct();
	}
}