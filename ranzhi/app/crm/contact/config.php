<?php
/**
 * The config file of contact module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     contact 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$config->contact->require = new stdclass();
$config->contact->require->create = 'customer, realname';
$config->contact->require->edit   = 'customer, realname';

$config->contact->editor = new stdclass();
$config->contact->editor->view = array('id' => 'comment,lastComment', 'tools' => 'simple');

$config->contact->contactWayList  = array('mobile', 'phone', 'email', 'qq', 'weixin', 'weibo', 'site', 'fax', 'wangwang', 'skype', 'yahoo', 'gtalk');
$config->contact->areaCode = ',010,020,021,022,023,024,025,027,028,029,';

global $lang, $app;
$app->loadLang('customer');
$config->contact->search['module'] = 'contact';

$config->contact->search['fields']['t1.realname']      = $lang->contact->realname;
$config->contact->search['fields']['t2.customer']      = $lang->contact->customer;
$config->contact->search['fields']['t1.phone']         = $lang->contact->phone;
$config->contact->search['fields']['t1.mobile']        = $lang->contact->mobile;
$config->contact->search['fields']['t1.email']         = $lang->contact->email;
$config->contact->search['fields']['t1.qq']            = $lang->contact->qq;
$config->contact->search['fields']['t1.contactedDate'] = $lang->contact->contactedDate;
$config->contact->search['fields']['t1.nextDate']      = $lang->customer->nextDate;
$config->contact->search['fields']['t1.id']            = $lang->contact->id;

$config->contact->search['params']['t1.realname']      = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->contact->search['params']['t2.customer']      = array('operator' => '=', 'control' => 'select', 'values' => 'set in control');
$config->contact->search['params']['t1.phone']         = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->contact->search['params']['t1.mobile']        = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->contact->search['params']['t1.email']         = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->contact->search['params']['t1.qq']            = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->contact->search['params']['t1.contactedDate'] = array('operator' => '>=', 'control' => 'input',  'values' => '', 'class' => 'date');
$config->contact->search['params']['t1.nextDate']      = array('operator' => '>=', 'control' => 'input',  'values' => '', 'class' => 'date');
$config->contact->search['params']['t1.id']            = array('operator' => '=', 'control' => 'input',  'values' => '');

$config->contact->list = new stdclass();
$config->contact->list->exportFields = '
  id, realname, customer, nickname, birthday, gender, 
  mobile, phone, email, qq, weixin, weibo, 
  skype,yahoo, gtalk, wangwang, site, fax, 
  createdBy, createdDate, editedBy, editedDate,
  contactedBy, contactedDate, nextDate, desc, resume, address';

$config->contact->templateFields   = array('origin', 'company', 'realname', 'nickname', 'gender', 'mobile', 'phone', 'email', 'qq', 'weibo', 'weixin', 'birthday', 'skype', 'yahoo', 'gtalk', 'wangwang', 'fax', 'site', 'desc');
$config->contact->excelCustomWidth = array('origin' => 15, 'company' => 15, 'realname' => 15, 'nickname' => 15, 'gender' => 10, 'mobile' => 15, 'phone' => 15, 'email' => 15, 'qq' => 15, 'weibo' => 15, 'weixin' => 15, 'birthday' => 15, 'skype' => 15, 'yahoo' => 15, 'gtalk' => 15, 'wangwang' => 15, 'site' => 15, 'fax' => 15, 'desc' => 40);
$config->contact->listFields       = array('gender');

/* Excel items. */
$config->excel->dateFields = array('birthday');

$config->excel->freeze->contact = 'email';
