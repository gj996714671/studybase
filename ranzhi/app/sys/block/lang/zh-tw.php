<?php
/**
 * The zh-tw file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->block->common = '區塊';
$lang->block->name   = '區塊名稱';
$lang->block->style  = '外觀';
$lang->block->grid   = '寬度';
$lang->block->color  = '顏色';

$lang->block->lblEntry = '應用';
$lang->block->lblBlock = '區塊';
$lang->block->lblRss   = 'RSS地址';
$lang->block->lblNum   = '條數';
$lang->block->lblHtml  = 'HTML內容';

$lang->block->params = new stdclass();
$lang->block->params->name  = '參數名稱';
$lang->block->params->value = '參數值';

$lang->block->createBlock        = '添加區塊';
$lang->block->editBlock          = '編輯區塊';
$lang->block->ordersSaved        = '排序已保存';
$lang->block->confirmRemoveBlock = '確定移除區塊【{0}】嗎？';

$lang->block->allEntries  = '所有應用';
$lang->block->dynamic     = '最新動態';
$lang->block->dynamicInfo = "%s, %s <em>%s</em> %s <a href='%s' %s>%s</a>。";

$lang->block->default['oa']['1']['title'] = '日曆';
$lang->block->default['oa']['1']['block'] = 'attend';
$lang->block->default['oa']['1']['grid']  = 6;

$lang->block->default['oa']['2']['title'] = '系統公告';
$lang->block->default['oa']['2']['block'] = 'announce';
$lang->block->default['oa']['2']['grid']  = 4;

$lang->block->default['oa']['2']['params']['num'] = 15;

$lang->block->default['proj']['3']['title'] = '指派給我的任務';
$lang->block->default['proj']['3']['block'] = 'task';
$lang->block->default['proj']['3']['grid']  = 4;

$lang->block->default['proj']['3']['params']['num']     = 15;
$lang->block->default['proj']['3']['params']['orderBy'] = 'id_desc';
$lang->block->default['proj']['3']['params']['status']  = array();
$lang->block->default['proj']['3']['params']['type']    = 'assignedTo';

$lang->block->default['proj']['4']['title'] = '項目列表';
$lang->block->default['proj']['4']['block'] = 'project';
$lang->block->default['proj']['4']['grid']  = 4;

$lang->block->default['proj']['4']['params']['num']     = 15;
$lang->block->default['proj']['4']['params']['orderBy'] = 'id_desc';
$lang->block->default['proj']['4']['params']['status']  = 'doing';

$lang->block->default['crm']['1']['title'] = '我的訂單';
$lang->block->default['crm']['1']['block'] = 'order';
$lang->block->default['crm']['1']['grid']  = 4;

$lang->block->default['crm']['1']['params']['num']     = 15;
$lang->block->default['crm']['1']['params']['orderBy'] = 'id_desc';
$lang->block->default['crm']['1']['params']['type']    = 'createdBy';
$lang->block->default['crm']['1']['params']['status']  = array();

$lang->block->default['crm']['2']['title'] = '我的合同';
$lang->block->default['crm']['2']['block'] = 'contract';
$lang->block->default['crm']['2']['grid']  = 4;

$lang->block->default['crm']['2']['params']['num']     = 15;
$lang->block->default['crm']['2']['params']['orderBy'] = 'id_desc';
$lang->block->default['crm']['2']['params']['type']    = 'returnedBy';
$lang->block->default['crm']['2']['params']['status']  = array();

$lang->block->default['crm']['3']['title'] = '本週聯繫';
$lang->block->default['crm']['3']['block'] = 'customer';
$lang->block->default['crm']['3']['grid']  = 4;

$lang->block->default['crm']['3']['params']['num']     = 15;
$lang->block->default['crm']['3']['params']['orderBy'] = 'id_desc';
$lang->block->default['crm']['3']['params']['type']    = 'thisweek';

$lang->block->default['cash']['1']['title'] = '付款賬戶';
$lang->block->default['cash']['1']['block'] = 'depositor';
$lang->block->default['cash']['1']['grid']  = 4;

$lang->block->default['cash']['1']['params'] = array();

$lang->block->default['cash']['2']['title'] = '賬目';
$lang->block->default['cash']['2']['block'] = 'trade';
$lang->block->default['cash']['2']['grid']  = 4;

$lang->block->default['cash']['2']['params']['num']     = 15;
$lang->block->default['cash']['2']['params']['orderBy'] = 'id_desc';

$lang->block->default['cash']['3']['title'] = '供應商';
$lang->block->default['cash']['3']['block'] = 'provider';
$lang->block->default['cash']['3']['grid']  = 4;

$lang->block->default['cash']['3']['params']['num']     = 15;
$lang->block->default['cash']['3']['params']['orderBy'] = 'id_desc';

$lang->block->default['team']['1']['title'] = '最新博客';
$lang->block->default['team']['1']['block'] = 'blog';
$lang->block->default['team']['1']['grid']  = 4;

$lang->block->default['team']['1']['params']['num'] = 15;

$lang->block->default['team']['2']['title'] = '最新帖子';
$lang->block->default['team']['2']['block'] = 'thread';
$lang->block->default['team']['2']['grid']  = 4;

$lang->block->default['team']['2']['params']['num'] = 15;
$lang->block->default['team']['2']['params']['type'] = 'new';

$lang->block->default['team']['3']['title'] = '置頂帖子';
$lang->block->default['team']['3']['block'] = 'thread';
$lang->block->default['team']['3']['grid']  = 4;

$lang->block->default['team']['3']['params']['num']  = 15;
$lang->block->default['team']['3']['params']['type'] = 'stick';

$lang->block->default['sys']['1'] = $lang->block->default['oa']['1'];
$lang->block->default['sys']['1']['source'] = 'oa';
$lang->block->default['sys']['2']['title']  = '最新動態';
$lang->block->default['sys']['2']['block']  = 'dynamic';
$lang->block->default['sys']['2']['grid']   = 6;
$lang->block->default['sys']['2']['source'] = '';
$lang->block->default['sys']['3'] = $lang->block->default['oa']['2'];
$lang->block->default['sys']['3']['source'] = 'oa';
$lang->block->default['sys']['4'] = $lang->block->default['crm']['2'];
$lang->block->default['sys']['4']['source'] = 'crm';
$lang->block->default['sys']['5'] = $lang->block->default['crm']['1'];
$lang->block->default['sys']['5']['source'] = 'crm';
$lang->block->default['sys']['6'] = $lang->block->default['cash']['1'];
$lang->block->default['sys']['6']['source'] = 'cash';
$lang->block->default['sys']['7'] = $lang->block->default['team']['1'];
$lang->block->default['sys']['7']['source'] = 'team';
$lang->block->default['sys']['8'] = $lang->block->default['team']['2'];
$lang->block->default['sys']['8']['source'] = 'team';

$lang->block->moreLinkList = new stdclass();
$lang->block->moreLinkList->order['assinedTo']    = '指派給我|sys|my|order|type=assinedTo';
$lang->block->moreLinkList->order['createdBy']    = '由我創建|sys|my|order|type=createdBy';
$lang->block->moreLinkList->order['signedBy']     = '由我簽約|sys|my|order|type=signedBy';
$lang->block->moreLinkList->order['normalstatus'] = '所有訂單|crm|order|browse|mode=all';
$lang->block->moreLinkList->order['signedstatus'] = '所有訂單|crm|order|browse|mode=all';
$lang->block->moreLinkList->order['closedstatus'] = '所有訂單|crm|order|browse|mode=all';

$lang->block->moreLinkList->contract['returnedBy']     = '由我回款|sys|my|contract|type=returnedBy';
$lang->block->moreLinkList->contract['deliveredBy']    = '由我交付|sys|my|contract|type=deliveredBy';
$lang->block->moreLinkList->contract['normalstatus']   = '未完成|crm|contract|browse|mode=unfinished';
$lang->block->moreLinkList->contract['closedstatus']   = '已完成|crm|contract|browse|mode=finished';
$lang->block->moreLinkList->contract['canceledstatus'] = '已取消|crm|contract|browse|mode=canceled';

$lang->block->moreLinkList->customer['today']    = '今天聯繫|crm|customer|browse|type=today';
$lang->block->moreLinkList->customer['thisweek'] = '本週聯繫|crm|customer|browse|type=thisweek';

$lang->block->moreLinkList->trade     = '賬目|cash|trade|browse|';
$lang->block->moreLinkList->depositor = '賬戶|cash|depositor|index|';
$lang->block->moreLinkList->provider  = '供應商|cash|provider|browse|';

$lang->block->moreLinkList->announce = '公告|oa|announce|browse|';
$lang->block->moreLinkList->attend   = '日曆|sys|todo|calendar|';

$lang->block->moreLinkList->task['assignedTo'] = '指派給我|sys|my|task|type=assignedTo';
$lang->block->moreLinkList->task['createdBy']  = '由我創建|sys|my|task|type=createdBy';
$lang->block->moreLinkList->task['finishedBy'] = '由我完成|sys|my|task|type=finishedBy';
$lang->block->moreLinkList->task['closedBy']   = '由我關閉|sys|my|task|type=closedBy';
$lang->block->moreLinkList->task['canceledBy'] = '由我取消|sys|my|task|type=canceledBy';

$lang->block->moreLinkList->project['doing']    = '進行中|proj|project|index|status=doing';
$lang->block->moreLinkList->project['finished'] = '已完成|proj|project|index|status=finished';
$lang->block->moreLinkList->project['suspend']  = '已掛起|proj|project|index|status=suspend';

$lang->block->moreLinkList->blog = '最新博客|team|blog|index|';
$lang->block->moreLinkList->thread['new']   = '最新帖子|team|forum|index|';
$lang->block->moreLinkList->thread['stick'] = '置頂帖子|team|forum|index|';

$lang->block->moreLinkList->report = '賬目報表|cash|trade|report|';
