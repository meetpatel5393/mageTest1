<?php
namespace Controller;
\Mage::loadFileByClassName('Controller\Core\Patient');
class Patient extends \Controller\Core\Patient
{
    protected $model = null;
    public function setModel()
    {
        $this->model = \Mage::getModel('Patient');
        return $this;
    }

    public function getModel()
    {
        if (!$this->model) {
            $this->setModel();
        }
        return $this->model;
    }

    public function searchPatientAction(){
        try {
            $patientName = $this->getRequest()->getPost('patientName');
            $layout = $this->getLayout();
            $content = $layout->getChild('content');
            $patientGrid = \Mage::getBlock('Patient\Patient\Grid')->setPatientName($patientName);
            $content->addChild($patientGrid,'patientGrid');
            $this->renderLayout();
        } catch (\Exception $e) {
            
        }
    }

    public function gridAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $patientGrid = \Mage::getBlock('Patient\Patient\Grid');
        $content->addChild($patientGrid,'patientGrid');
        $this->renderLayout();
    }

    public function showAction()
    {
        try {
            $patientId = (int) $this->getRequest()->getGet('patientId');
            $patient =$this->getModel();
            $patient->load($patientId);

            $layout = $this->getLayout();
            $content = $layout->getChild('content');
            $patientFrom = \Mage::getBlock('Patient\Patient\Edit')->setTableRow($patient);
            $content->addChild($patientFrom,'patientFrom');
            $this->renderLayout();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request");
            }
            $patientData = $this->getRequest()->getPost('patient');
            $patientId   = (int) $this->getRequest()->getGet('patientId');
            $data      = $this->getModel()->load($patientId);

            if($data) {
                $this->getModel()->patientId = $patientId;
                $this->getMessage()->setSuccess('Patient record updated.');
            } else {
                $this->getMessage()->setSuccess('Patient record added.');
            }
            $this->getModel()->setData($patientData);
            $this->getModel()->save();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
       $this->redirect('grid','Patient',null,true);
    }

    public function deleteAction()
    {
        try {
            $patientId   = (int) $this->getRequest()->getGet('patientId');
            $patientData      = $this->getModel()->load($patientId);
            if (!$patientId) {
                throw new \Exception("Invalid Id");
            }
            if (!$patientData) {
                throw new \Exception("Unable to find data on this id.");
            }
            $this->getModel()->delete();
            $this->getMessage()->setSuccess('Patient Data Successfully Deleted');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }        
        $this->redirect('grid','Patient',null,true);
    }
}