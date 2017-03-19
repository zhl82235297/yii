<?php
  use yii\helpers\Html;
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
    APP  =   '/many/upload/index.php';
</script>
<?=Html::jsFile( '@web/public/js/jquery.QSdialog.js')?>
<?=Html::jsFile( '@web/public/js/jquery.vtip-min.js')?>
<?=Html::jsFile( '@web/public/js/jquery.grid.rowSizing.pack.js')?>
<?=Html::jsFile( '@web/public/js/jquery.validate.min.js')?>
<?=Html::jsFile( '@web/public/js/common.js')?>
</head>
<body>
  

<div class="toptip">
	<h2>提示：</h2>
	<p>确认收款后系统将会自动为会员充值{:C('qscms_points_byname')}或开通服务，此操作无法撤销。</p>
  </div>
<div class="toptit">设置订单</div>
<form id="Form1" name="Form1" method="post" action="?r=order/order_set_per">
  <table width="100%" border="0" cellpadding="4" cellspacing="0"  >
    <tr>
      <td width="160" height="30" align="right" style=" border-bottom:1px #CCCCCC dashed">申请充值会员：</td>
      <td style=" border-bottom:1px #CCCCCC dashed"><?=$info['uid']?> </td>
    </tr>
    <tr>
      <td height="30" align="right" style=" border-bottom:1px #CCCCCC dashed">订单金额：</td>
      <td style=" border-bottom:1px #CCCCCC dashed" >
      ￥<span style="color:#0033CC; font-size:20px;"><?=$info['amount']?></span> 元
      </td>
    </tr>
   <!--  <tr>
     <td height="30" align="right" style=" border-bottom:1px #CCCCCC dashed">应付款金额：</td>
     <td style=" border-bottom:1px #CCCCCC dashed" >
     <if condition="$info['pay_type'] eq 1">
     <span style="color:#0033CC; font-size:20px;">{$info['pay_points']}</span> {:C('qscms_points_byname')}
     <elseif condition="$info['pay_type'] eq 2" />
     ￥<span style="color:#0033CC; font-size:20px;">{$info['pay_amount']}</span> 元
     <else />
     ￥<span style="color:#0033CC; font-size:20px;">{$info['pay_amount']}</span> 元 + <span style="color:#0033CC; font-size:20px;">{$info['pay_points']}</span> {:C('qscms_points_byname')}
     </if>
     </td>
   </tr> -->
      <tr>
      <td height="30" align="right" style=" border-bottom:1px #CCCCCC dashed">订单描述：</td>
      <td style=" border-bottom:1px #CCCCCC dashed" ><?=$info['description']?> </td>
    </tr>
        <tr>
      <td height="30" align="right" style=" border-bottom:1px #CCCCCC dashed">支付方式：</td>
      <td style=" border-bottom:1px #CCCCCC dashed" ><?=$info['payment_name']?></td>
    </tr>
  <tr>
      <td height="30" align="right" style=" border-bottom:1px #CCCCCC dashed">订单单号：</td>
      <td style=" border-bottom:1px #CCCCCC dashed" ><?=$info['oid']?><input type="hidden" name="oid"  value="<?=$info['oid']?>" /></td>
    </tr>
    <tr>
      <td height="30" align="right" style=" border-bottom:1px #CCCCCC dashed">申请时间：</td>
      <td style=" border-bottom:1px #CCCCCC dashed" ><?=date('Y-m-d H:i:s',$info['addtime'])?></td>
    </tr>
    
    <tr>
      <td height="30" align="right" style=" border-bottom:1px #CCCCCC dashed">添加备注：</td>
      <td style=" border-bottom:1px #CCCCCC dashed" >
    <textarea name="notes" style="width:300px; height:50px; font-size:12px; line-height:180%" onpropertychange="if(this.value.length>120){this.value=this.value.slice(0,120)}"><?=$info['notes']?></textarea>
     </td>
    </tr>
    <tr>
      <td height="30" align="right" >&nbsp;</td>
      <td height="80" ><span style="font-size:14px;">
        <input type="hidden" name="id"  value="<?=$info['id']?>" />
        <input name="submit3" type="submit" class="admin_submit"    value="确认收款"/> <span style="color: #666666; font-size:12px">(确认收到款后，系统将会自动为会员充值)</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
        <br />
        <input name="submit22" type="button" class="admin_submit"    value="返 回" onclick="javascript:history.go(-1);"/>
      </span></td>
    </tr>
  </table>
  </form>
</div>

</body>
</html>