<?php
	use yii\helpers\Html;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台欢迎页</title>
	<?=Html::cssFile('@web/public/css/reset.css')?>
	<?=Html::cssFile('@web/public/css/content.css')?>
</head>
<body marginwidth="0" marginheight="0">
	<div class="container">
		<div class="public-nav">您当前的位置：<a href="">管理首页</a>></div>
		<div class="public-content">
			<div class="public-content-cont">
				<p style="width: 100%;text-align: center; padding: 50px 0; font-size: 16px; color: #FF0000;">欢迎张傻叉！ 欢迎登陆网站后台！</p>
			</div>
		</div>
	</div>
</body>
</html>