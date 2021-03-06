<?php
/**
 * The create view file of contract module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     contract
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php js::set('customer', isset($customer) ? $customer : 0);?>
<?php js::set('order', isset($orderID) ? $orderID : 0);?>
<?php js::set('label', $lang->contract->order);?>
<div class='panel xuanxuan-card'>
  <div class='panel-heading'>
    <strong><i class='icon-plus'></i> <?php echo $lang->contract->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form'>
        <tr>
          <th class='w-80px'><?php echo $lang->contract->customer;?></th>
          <td><?php echo html::select('customer', $customers, isset($customer) ? $customer : '', "class='form-control chosen' data-no_results_text='" . $lang->searchMore . "'");?></td>
        </tr>
        <?php if(isset($currentOrder)):?>
        <tr>
          <th class='orderTH'><?php echo $lang->contract->order;?></th>
          <td>
            <div class='input-group'>
              <select name='order[]' class='select-order form-control'>
                <option value=''></option>
                <?php foreach($orders as $order):?>
                <?php $selected = $orderID == $order->id ? 'selected' : ''; ?>
                <option value="<?php echo $order->id;?>" <?php echo $selected;?>  data-real="<?php echo $order->plan;?>" data-currency="<?php echo $order->currency?>"><?php echo $order->title;?></option>
                <?php endforeach;?>
              </select>
              <span class='input-group-addon fix-border order-currency'><?php echo zget($currencySign, $currentOrder->currency, '');?></span>
              <?php echo html::input('real[]', $currentOrder->plan, "class='order-real form-control' placeholder='{$this->lang->contract->placeholder->real}'");?>
              <span class='input-group-btn'><?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='plus btn'") . html::a('javascript:;', "<i class='icon-remove'></i>", "class='minus btn'");?></span>
            </div>
          </td>
        </tr>
        <?php endif;?>
        <tr id='orderTR' class='hide'>
          <th class='orderTH'><?php echo $lang->contract->order;?></th>
          <td id='orderTD'></td>
        </tr>
        <tr class='hide' id='tmpData'><td></td></tr>
        <tr>
          <th><?php echo $lang->contract->name;?></th>
          <td><?php echo html::input('name', '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->contract->code;?></th>
          <td><?php echo html::input('code', '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->contract->amount;?></th>
          <td>
            <div class='row'>
              <div class='col-xs-3'><?php echo html::select('currency', $currencyList, isset($currentOrder) ? $currentOrder->currency : '', "class='form-control'");?></div>
              <div class='col-xs-9'><?php echo html::input('amount', isset($currentOrder) ? $currentOrder->plan : '', "class='form-control'");?></div>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->contract->contact;?></th>
          <td class='contactTD'><select name='contact' id='contact' class='form-control'></select></td>
        </tr>
        <tr>
          <th><?php echo $lang->contract->address;?></th>
          <td>
            <div class='input-group'>
              <?php echo html::select('address', '', '', "class='form-control chosen'");?>
              <?php echo html::input('newAddress', '', "class='form-control'");?>
              <span class='input-group-addon'>
                <label class='checkbox-inline'>
                  <input type='checkbox' name='createAddress' id='createAddress' value='1' /> <?php echo $lang->contract->createAddress;?>
                </label>
              </span>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->contract->signedBy;?></th>
          <td><?php echo html::select('signedBy', $users, '', "class='form-control chosen'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->contract->signedDate;?></th>
          <td><?php echo html::input('signedDate', '', "class='form-control form-date'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->contract->dateRange;?></th>
          <td>
            <div class="input-group">
              <?php echo html::input('begin', '', "class='form-control form-date' placeholder='{$lang->contract->begin}'");?>
              <span class='input-group-addon fix-border'><?php echo $lang->minus;?></span>
              <?php echo html::input('end', '', "class='form-control form-date' placeholder='{$lang->contract->end}'");?></td>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->contract->handlers;?></th>
          <td><?php echo html::select('handlers[]', $users, $this->app->user->account, "class='form-control chosen' multiple");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->contract->items;?></th>
          <td><?php echo html::textarea('items', '',"rows='5' class='form-control'");?></td>
        </tr>
        <?php if(commonModel::hasPriv('file', 'upload')):?>
        <tr>
          <th><?php echo $lang->contract->uploadFile;?></th>
          <td><?php echo $this->fetch('file', 'buildForm');?></td>
        </tr>
        <?php endif;?>
        <tr>
          <th></th>
          <td><?php echo html::submitButton() . '&nbsp;&nbsp;' . html::backButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<table class='hide'><tr class='orderInfo'><td></td></tr></table>
<?php js::set('currencySign', array('' => '') + $currencySign);?>
<?php include '../../common/view/footer.html.php';?>
