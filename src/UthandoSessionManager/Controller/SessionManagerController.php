<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManager\Controller
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoSessionManager\Controller;

use UthandoCommon\Controller\AbstractCrudController;
use Zend\View\Model\ViewModel;

/**
 * Class SessionManagerController
 *
 * @package UthandoSessionManager\Controller
 */
class SessionManagerController extends AbstractCrudController
{
    protected $controllerSearchOverrides = array('sort' => 'id');
    protected $serviceName = 'UthandoSessionManager';
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
        $id = (string)$this->params()->fromRoute('id', 0);

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