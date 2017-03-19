<?php
  //use Yii;
  use yii\helpers\Html;
  use yii\helpers\Url;

  $get=Yii::$app->request->get();
  
  $url=$get['r'];
  unset($get['r']);
  $get[]=$url;
  $is_paid=isset($get['is_paid']) ? $get['is_paid'] :'';
  $payment=isset($get['payment']) ? $get['payment'] :'';
  $settr=isset($get['settr']) ? $get['settr'] : '';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="/many/upload/favicon.ico" />
<meta name="author" content="骑士CMS" />
<meta name="copyright" content="74cms.com" />
<title> Powered by 74CMS</title>
<?=Html::cssFile('@web/public/css/common.css')?>
<?=Html::jsFile( '@web/public/js/jquery.min.js')?>
<script>
	var URL = '/many/upload/index.php/admin/order',
		SELF = '/many/upload/index.php?m=admin&amp;c=order&amp;a=index_per',
		ROOT_PATH = '/many/upload/index.php/admin',
		APP	 =	 '/many/upload/index.php';
</script>
<?=Html::jsFile( '@web/public/js/jquery.QSdialog.js')?>
<?=Html::jsFile( '@web/public/js/jquery.vtip-min.js')?>
<?=Html::jsFile( '@web/public/js/jquery.grid.rowSizing.pack.js')?>
<?=Html::jsFile( '@web/public/js/jquery.validate.min.js')?>
<?=Html::jsFile( '@web/public/js/common.js')?>
</head>

<body style="background-color:#E0F0FE">
	<div class="admin_main_nr_dbox">
	    <div class="pagetit">
	        <div class="ptit"> 订单管理</div>
	        	        <div class="clear"></div>
	    </div>
		<div class="seltpye_x">
		<div class="left">完成状态</div>	
		<div class="right">

			<a href="<?php $get['is_paid']='';echo url::to($get);?>"<?php if(Yii::$app->getRequest()->getQueryParam('is_paid')==''){echo "class='select'";} ?>   >不限</a>
			<a href="<?php $get['is_paid']='2';echo url::to($get);?>" <?php if(Yii::$app->getRequest()->getQueryParam('is_paid')=='2'){echo "class='select'";} ?>  >已完成</a>
			<a href="<?php $get['is_paid']='1';echo url::to($get);?>" <?php if(Yii::$app->getRequest()->getQueryParam('is_paid')=='1'){echo "class='select'";} ?> >待付款</a>
			<a href="<?php $get['is_paid']='3';echo url::to($get);?>" <?php if(Yii::$app->getRequest()->getQueryParam('is_paid')=='3'){echo "class='select'";} ?> >已取消</a>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
  </div>
    <div class="seltpye_x">
		<div class="left">付款方式</div>	
		<div class="right">
			<a href="<?php $get['payment']='';$get['is_paid']=$is_paid; echo url::to($get);?>" <?php if(Yii::$app->getRequest()->getQueryParam('payment')==''){echo "class='select'";} ?>  >不限</a>
			<a href="<?php $get['payment']='points';$get['is_paid']=$is_paid; echo url::to($get);?>" <?php if(Yii::$app->getRequest()->getQueryParam('payment')=='points'){echo "class='select'";} ?> 
			 >积分支付</a>
			<a href="<?php $get['payment']='alipay';$get['is_paid']=$is_paid; echo url::to($get);?>" <?php if(Yii::$app->getRequest()->getQueryParam('payment')=='alipay'){echo "class='select'";} ?>
			 >支付宝</a>
			<a href="<?php $get['payment']='wxpay';$get['is_paid']=$is_paid; echo url::to($get);?>" <?php if(Yii::$app->getRequest()->getQueryParam('payment')=='wxpay'){echo "class='select'";} ?> 
			 >微信支付</a>			
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
  </div>
  <div class="seltpye_x">
		<div class="left">添加时间</div>	
		<div class="right">
		<a href="<?php $get['settr']='';$get['is_paid']=$is_paid;$get['payment']=$payment; echo url::to($get);?>" <?php if(Yii::$app->getRequest()->getQueryParam('settr')==''){echo "class='select'";} ?> >不限</a>
		<a href="<?php $get['settr']=3;$get['is_paid']=$is_paid;$get['payment']=$payment; echo url::to($get);?>" <?php if(Yii::$app->getRequest()->getQueryParam('settr')==3){echo "class='select'";} ?> >三天内</a>
		<a href="<?php $get['settr']=7;$get['is_paid']=$is_paid;$get['payment']=$payment; echo url::to($get);?>" <?php if(Yii::$app->getRequest()->getQueryParam('settr')==7){echo "class='select'";} ?> >一周内</a>
		<a href="<?php $get['settr']=30;$get['is_paid']=$is_paid;$get['payment']=$payment; echo url::to($get);?>" <?php if(Yii::$app->getRequest()->getQueryParam('settr')==30){echo "class='select'";} ?> >一月内</a>
		<a href="<?php $get['settr']=180;$get['is_paid']=$is_paid;$get['payment']=$payment; echo url::to($get);?>" <?php if(Yii::$app->getRequest()->getQueryParam('settr')==180){echo "class='select'";} ?> >半年内</a>
		<a href="<?php $get['settr']=360;$get['is_paid']=$is_paid;$get['payment']=$payment; echo url::to($get);?>" <?php if(Yii::$app->getRequest()->getQueryParam('settr')==360){echo "class='select'";} ?> >一年内</a>
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
  </div>

  <form id="form1" name="form1" method="post" action="/many/upload/index.php?m=admin&c=order&a=order_cancel_per">
  <input type="hidden" name="_k_v" value="">
  <table width="100%" border="0" cellpadding="0" cellspacing="0"  id="list" class="link_lan">
    <tr>
      <td  width="10%" class="admin_list_tit admin_list_first">
	   <label id="chkAll"><input type="checkbox" name=" " title="全选/反选" id="chk"/>全选</label></td>
      <td class="admin_list_tit" width="10%">金额</td>   
	  <td class="admin_list_tit" align="center">说明</td> 
	  <td align="center" class="admin_list_tit" width="190">单号</td>
	  <td width="10%" align="center" class="admin_list_tit">申请会员</td>
	  <td width="8%" align="center" class="admin_list_tit">申请时间</td>
      <td width="8%" align="center" class="admin_list_tit">支付方式</td>      
      <td width="15%" align="center"  class="admin_list_tit">操作</td>
    </tr>
    <?php foreach ($data as $key => $vo) {?>
    <tr>
      <td class="admin_list admin_list_first">	
      <?php if ($vo['is_paid']==1) { ?>
      	<input name="id[]" type="checkbox" class="y_id" value="<?=$vo['id']?>"  />
      	<span style="color: #FF6600">待付款...</span>
      <?php }else if($vo['is_paid']==2){?>
		<input name="id[]" type="checkbox" class="y_id" value="<?=$vo['id']?>" disabled="disabled"/>
		<span style="color: #009900;">已完成</span>
      <?php }else{ ?>
		<input name="id[]" type="checkbox" class="y_id" value="<?=$vo['id']?>" disabled="disabled"/>
		<span style="color: #999;">已取消</span>
      <?php } ?> 
	   </td>
        <td class="admin_list">￥<strong><?=$vo['amount']?></strong>元</td>        
		<td class="admin_list"><?=$vo['description']?></td>     
		<td align="center" class="admin_list"><?=$vo['oid']?></td>
		<td align="center" class="admin_list"><?=$vo['uid']?></td>
		<td align="center" class="admin_list"><?=date('Y-m-d',$vo['addtime'])?></td>    
        <td align="center" class="admin_list"><?=$vo['payment_name']?></td>        
        <td align="center" class="admin_list">
        <?php if ($vo['is_paid'] == 2 || $vo['is_paid'] == 3) { ?>

			<a href="?r=order/order_show_per&id=<?=$vo['id']?>">查看</a>&nbsp;设置

		<?php } ?>
		<?php if ($vo['is_paid'] == 1) { ?>
			<a href="?r=order/order_set_per&id=<?=$vo['id']?>">设置</a>
			<a href="?r=order/order_cancel_per&id=<?=$vo['id']?>" onclick="return confirm('你确定要取消吗？')">取消</a>
		<?php } ?>
		</td>
     </tr>
    <?php }?>
      

	  </table>
	 </form>
	<table width="100%" border="0" cellspacing="10" cellpadding="0" class="admin_list_btm">
      <tr>
        <td>
          <input name="ButAudit" type="button" class="admin_submit" id="ButDelOrder"  value="取消订单"  />
		</td>
		<td width="305" align="right">
			<form id="formseh" name="formseh" method="get" action="?">	
	              <input type="hidden" name="m" value="Admin">
	              <input type="hidden" name="c" value="Order">
	              <input type="hidden" name="a" value="index_per">
				<div class="seh">
				    <div class="keybox"><input name="key" type="text"   value="" /></div>
				    <div class="selbox">
						<input name="key_type_cn"  id="key_type_cn" type="text" value="用户名" readonly="true"/>
							<div>
								<input name="key_type" id="key_type" type="hidden" value="1" />
									<div id="sehmenu" class="seh_menu">
											<ul>
											<li id="1" title="用户名">用户名</li>
											<li id="2" title="单号">单号</li>
											</ul>
									</div>
							</div>				
					</div>
					<div class="sbtbox">
					<input type="submit" name="" class="sbt" id="sbt" value="搜索"/>
					</div>
					<div class="clear"></div>
			  </div>
			  </form>
	    	</td>      </tr>
  </table>
<div class="qspage"></div>
</div>

</body>
</html>

<script type="text/javascript">
$(document).ready(function()
{
	showmenu("#key_type_cn","#sehmenu","#key_type");
	 $(".userinfo").QSdialog({
  DialogTitle:"管理",
  DialogContentType:"url",
  DialogContent:"/many/upload/index.php?m=admin&c=ajax&a=userinfo&"
  });
		
});

</script>
</body>
</html>