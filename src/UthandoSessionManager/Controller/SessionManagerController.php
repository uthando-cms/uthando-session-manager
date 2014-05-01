<?php
namespace UthandoSessionManager\Controller;

use UthandoCommon\Controller\AbstractCrudController;
use Zend\View\Model\ViewModel;

class SessionManagerController extends AbstractCrudController
{
    protected $searchDefaultParams = array('sort' => 'id');
    protected $serviceName = 'UthandoSessionManager\Service\SessionManager';
    protected $route = 'admin/session';
    
    public function indexAction()
    {
        try {
            parent::indexAction();
        } catch (\Exception $e) {
            $model = new ViewModel();
            $model->setTemplate('uthando-session-manager/session-manager/not-implemented');
            return $model;
        }
    }
    
    public function viewAction()
    {
        $id = (string) $this->params()->fromRoute('id', 0);
    
        $viewModel = new ViewModel(array(
            'session' => $this->getService()->getById($id)
        ));
    
        $viewModel->setTerminal(true);
        return $viewModel;
    }
    
    public function addAction()
    {
        return $this->redirect()->toRoute($this->getRoute());
    }
    
    public function editAction()
    {
        return $this->redirect()->toRoute($this->getRoute());
    }
}