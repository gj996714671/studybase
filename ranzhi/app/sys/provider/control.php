<?php
/**
 * The control file of provider module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     customer 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class provider extends control
{
    public function __construct($moduleName = '', $methodName = '', $appName = '')
    {
        parent::__construct($moduleName, $methodName, $appName);
        $this->loadModel('customer');
        $this->loadModel('contact', 'crm');
        $this->loadModel('resume', 'crm');
    }

    /** 
     * The index page, locate to the browse page.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $this->locate(inlink('browse'));
    }

    /**
     * Browse provider.
     * 
     * @param  string $mode
     * @param  string $param
     * @param  string $orderBy     the order by
     * @param  int    $recTotal 
     * @param  int    $recPerPage 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function browse($mode = 'all', $param = '', $orderBy = 'id_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {   
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        /* Build search form. */
        $this->loadModel('search', 'sys');
        $this->config->customer->search['actionURL'] = $this->createLink('provider', 'browse', 'mode=bysearch');
        $this->config->customer->search['params']['industry']['values'] = array('' => '') + $this->loadModel('tree')->getOptionMenu('industry');
        $this->config->customer->search['params']['area']['values']     = array('' => '') + $this->loadModel('tree')->getOptionMenu('area');
        unset($this->config->customer->search['fields']['intension']);
        unset($this->config->customer->search['fields']['source']);
        unset($this->config->customer->search['fields']['level']);
        unset($this->config->customer->search['fields']['status']);
        unset($this->config->customer->search['fields']['assignedTo']);
        unset($this->config->customer->search['fields']['relation']);

        $this->search->setSearchParams($this->config->customer->search);

        $providers = $this->customer->getList($mode = $mode, $param = $param, $relation = 'provider', $orderBy, $pager);

        $this->session->set('providerList', $this->app->getURI(true));

        /* Set allowed edit customer ID list. */
        $this->app->user->canEditCustomerIdList = ',' . implode(',', $this->customer->getCustomersSawByMe('edit', array_keys($providers))) . ',';

        $this->view->title      = $this->lang->provider->list;
        $this->view->mode       = $mode;
        $this->view->providers  = $providers;
        $this->view->areas      = $this->loadModel('tree')->getOptionMenu('area');
        $this->view->industries = $this->tree->getOptionMenu('industry');
        $this->view->treeMenu   = $this->loadModel('tree')->getTreeMenu('provider', 0, array('treeModel', 'createProviderBrowseLink'));
        $this->view->pager      = $pager;
        $this->view->orderBy    = $orderBy;
        $this->display();
    }   

    /**
     * Create a provider.
     * 
     * @access public
     * @return void
     */
    public function create()
    {
        if($_POST)
        {
            $return = $this->customer->create($provider = null, $relation = 'provider');
            $this->send($return);
        }

        unset($this->lang->provider->menu);
        $this->view->title      = $this->lang->provider->create;
        $this->view->areas      = $this->loadModel('tree')->getOptionMenu('area');
        $this->view->industries = $this->tree->getOptionMenu('industry');
        $this->view->categories = $this->tree->getOptionMenu('provider');
        $this->display();
    }

    /**
     * Edit a provider.
     * 
     * @param  int    $providerID 
     * @access public
     * @return void
     */
    public function edit($providerID)
    {
        if($_POST)
        {
            $changes = $this->customer->update($providerID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            if(!empty($changes))
            {
                $actionID = $this->loadModel('action')->create('provider', $providerID, 'Edited');
                $this->action->logHistory($actionID, $changes);
            }

            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('view', "providerID=$providerID")));
        }

        $this->view->title      = $this->lang->provider->edit;
        $this->view->provider   = $this->customer->getByID($providerID);
        $this->view->areas      = $this->loadModel('tree')->getOptionMenu('area');
        $this->view->industries = $this->tree->getOptionMenu('industry');
        $this->view->categories = $this->tree->getOptionMenu('provider');

        $this->display();
    }

    /**
     * View a provider.
     * 
     * @param  int    $providerID 
     * @access public
     * @return void
     */
    public function view($providerID)
    {
        if(!$this->session->contactList or $this->session->providerList == $this->session->contactList)
        {
            $this->session->set('contactList', $this->app->getURI(true));
        }

        $this->view->title      = $this->lang->provider->view;
        $this->view->provider   = $this->customer->getByID($providerID);
        $this->view->contacts   = $this->contact->getList($providerID, 'provider');
        $this->view->actions    = $this->loadModel('action')->getList('customer', $providerID);
        $this->view->areas      = $this->loadModel('tree')->getPairs('', 'area');
        $this->view->industries = $this->tree->getPairs('', 'industry');
        $this->display();
    }

    /**
     * Browse contacts of the provider.
     * 
     * @param  int    $providerID 
     * @access public
     * @return void
     */
    public function contact($providerID)
    {
        $this->app->user->canEditContactIdList = ',' . implode(',', $this->contact->getContactsSawByMe('edit')) . ',';
        $this->view->title      = $this->lang->provider->contact;
        $this->view->contacts   = $this->contact->getList($providerID, 'provider');
        $this->view->providerID = $providerID;
        $this->view->modalWidth = 'lg';
        $this->display();
    }

    /**
     * Link contact.
     * 
     * @param  int    $providerID 
     * @access public
     * @return void
     */
    public function linkContact($providerID)
    {
        if($_POST)
        {
            $return = $this->customer->linkContact($providerID);
            $this->send($return);
        }

        $this->view->title      = $this->lang->provider->linkContact;
        $this->view->contacts   = $this->contact->getPairs();
        $this->view->providerID = $providerID;
        $this->display();
    }

    /**
     * Delete a provider.
     *
     * @param  int    $providerID
     * @access public
     * @return void
     */
    public function delete($providerID)
    {
        $this->customer->delete(TABLE_CUSTOMER, $providerID);
        if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
        $this->send(array('result' => 'success', 'locate' => inlink('browse')));
    }
}
