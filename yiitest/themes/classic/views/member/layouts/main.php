<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title><?php echo CHtml::encode($this->pageTitle);?></title>
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico"/>
<link rel="bookmark" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
</head>
<body>
<div id="msgbox" style="display:none;"></div>
{dmsg()}
<div class="head">
	<div id="top">
	<span class="f_r">
	{if $_userid}
	<a href="{userurl($_username)}" target="_blank">{$_company}({$_username})</a> | 
	<a href="{$MODULE[2][linkurl]}record.php">{$DT[money_name]}({$_money})</a> | 
	<a href="{$MODULE[2][linkurl]}credit.php">{$DT[credit_name]}({$_credit})</a> | 
	<a href="{$MODULE[2][linkurl]}edit.php">修改资料</a> | 
	<a href="{$MODULE[2][linkurl]}edit.php?tab=1">修改密码</a> | 
	<a href="{$MODULE[2][linkurl]}logout.php?forward=">退出</a>{if $admin_user} | <a href="{$MODULE[2][linkurl]}index.php?action=logout" style="color:#FF0000;">注销授权</a>{/if}
	{else}
	<a href="{$MODULE[2][linkurl]}{$DT[file_login]}">立即登录</a> | 
	<a href="{$MODULE[2][linkurl]}{$DT[file_register]}">注册会员</a>
	{/if}
	</span>
	<a href="{$MODULE[2][linkurl]}ask.php">客服中心</a> | 
	<a href="{$MODULE[2][linkurl]}grade.php">会员等级</a> | 
	<a href="{DT_PATH}">网站首页</a>
	</div>

	<div>
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td width="195" height="55"><a href="{$MODULE[2][linkurl]}"><img src="image/logo.jpg" title="商务中心首页"/></a></td>
	<td>
		<div class="head_user">
		{if $_userid}
			<strong class="px14" style="color:#555555;">欢迎，{$_truename} </strong>
			({$MG[groupname]} <a href="{$MODULE[2][linkurl]}line.php" title="{if $_online}点击隐身{else}点击上线{/if}">{if $_online}<span class="f_green">在线</span>{else}<span class="f_gray">隐身</span>{/if}</a>)
			{if $MG[inbox_limit]>-1}
			&nbsp;&nbsp;&nbsp;[ 
			{if $_message}<img src="image/ico_newmessage.gif" align="absmiddle"/> {/if}<a href="{$MODULE[2][linkurl]}message.php" class="b">新信件</a>({if $_message}<a href="{$MODULE[2][linkurl]}message.php?action=last"><strong class="f_red">{$_message}</strong></a>{else}0{/if}) | 
			{if $DT[im_web]}
			{if $_chat}<img src="image/ico_newchat.gif" align="absmiddle"/> {/if}<a href="{$MODULE[2][linkurl]}chat.php" class="b" target="destoon_chat">新对话</a>({if $_chat}<strong class="f_red">{$_chat}</strong>{else}0{/if}) | 
			{/if}
			<a href="{$MODULE[2][linkurl]}" class="b">我的商务室</a>
			]
			{/if}
		{/if}
		</div>
	</td>
	<td class="head_sch">
	<form action="{DT_PATH}search.php" id="head_sh" target="_blank" onsubmit="return sh(0);">
	<select id="head_md" name="moduleid">
	{loop $MODULE $v}{if $v[ismenu] && !$v[islink]}<option value="{$v[moduleid]}">{$v[name]}</option>{/if}{/loop}
	</select>
	<input type="text" size="30" name="kw" id="head_kw" value="输入关键词" onfocus="if(this.value=='输入关键词')this.value='';" maxlength="10"/><img src="{DT_SKIN}image/spacer.gif" id="head_bt" onclick="sh(1);"/>
	</form>
	</td>
	</tr>
	</table>
	</div>
</div>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td valign="top" class="side" id="side">

{if $MYMODS || $show_menu}
	<div class="side_head" onclick="c(0);"><div><img src="image/arrow_c.gif" width="16" height="16" align="right" alt="" id="I_0"/>信息管理</div></div>
	<div class="side_body" id="D_0">
		<ul>
		{loop $MENUMODS $k $v}
			{if $v==9}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="mid_job"><span class="f_r"><a href="{$MODULE[2][linkurl]}{$DT[file_my]}?mid=9&action=add" class="m">发布</a></span><a href="{$MODULE[2][linkurl]}{$DT[file_my]}?mid=9" class="{if in_array($v, $MYMODS)}n{else}f{/if}">招聘管理</a></li>
			{elseif $v==-9}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="mid_resume"><span class="f_r"><a href="{$MODULE[2][linkurl]}{$DT[file_my]}?mid=9&action=add&resume=1" class="m">创建</a></span><a href="{$MODULE[2][linkurl]}{$DT[file_my]}?mid=9&resume=1" class="{if in_array($v, $MYMODS)}n{else}f{/if}">简历管理</a></li>
			{else}
				<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);"  id="mid_{$v}"><span class="f_r"><a href="{$MODULE[2][linkurl]}{$DT[file_my]}?mid={$v}&action=add" class="m">发布</a></span><a href="{$MODULE[2][linkurl]}{$DT[file_my]}?mid={$v}" class="{if in_array($v, $MYMODS)}n{else}f{/if}">{$MODULE[$v][name]}管理</a></li>
			{/if}
		{/loop}
		</ul>
	</div>
{/if}


{if $_userid || $show_menu}
	<div class="side_head" onclick="c(1);"><div><img src="image/arrow_o.gif" width="16" height="16" align="right" alt="" id="I_1"/>商机管理</div></div>
	<div class="side_body" id="D_1" style="display:none;">
		<ul>
			{if $MG[inbox_limit]>-1 || $show_menu}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="message"><span class="f_r"><a href="{$MODULE[2][linkurl]}message.php?action=send" class="m">发信</a></span><a href="{$MODULE[2][linkurl]}message.php" class="{if $MG[inbox_limit]>-1}n{else}f{/if}">站 内 信</a></li>
			{/if}
	
			{if $MG[friend_limit]>-1 || $show_menu}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="friend"><span class="f_r"><a href="{$MODULE[2][linkurl]}friend.php?action=add" class="m">添加</a></span><a href="{$MODULE[2][linkurl]}friend.php" class="{if $MG[friend_limit]>-1}n{else}f{/if}">我的商友</a></li>
			{/if}

			{if $MG[favorite_limit]>-1 || $show_menu}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="favorite"><span class="f_r"><a href="{$MODULE[2][linkurl]}favorite.php?action=add" class="m">添加</a></span><a href="{$MODULE[2][linkurl]}favorite.php" class="{if $MG[favorite_limit]>-1}n{else}f{/if}">商机收藏</a></li>
			{/if}

			{if $MG[alert_limit]>-1 || $show_menu}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="alert"><span class="f_r"><a href="{$MODULE[2][linkurl]}alert.php?action=add" class="m">添加</a></span><a href="{$MODULE[2][linkurl]}alert.php" class="{if $MG[alert_limit]>-1}n{else}f{/if}">贸易提醒</a></li>
			{/if}

			{if $MG[sms] || $show_menu}
			{if $DT[sms]}<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="sms"><span class="f_r"><a href="{$MODULE[2][linkurl]}sms.php?action=add" class="m">发送</a></span><a href="{$MODULE[2][linkurl]}sms.php" class="{if $MG[sms]}n{else}f{/if}">手机短信</a></li>{/if}
			{/if}

			{if $MG[mail] || $show_menu}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="mail"><span class="f_r"><a href="{$MODULE[2][linkurl]}sendmail.php" class="m">电邮</a></span><a href="{$MODULE[2][linkurl]}mail.php" class="{if $MG[mail]}n{else}f{/if}">邮件订阅</a></li>
			{/if}
			{if $MG[spread] || $show_menu}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="spread"><span class="f_r"><a href="{$MODULE[2][linkurl]}spread.php?action=add" class="m">购买</a></span><a href="{$MODULE[2][linkurl]}spread.php" class="{if $MG[spread]}n{else}f{/if}">排名推广</a></li>
			{/if}
			{if $MG[ad] || $show_menu}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="ad"><span class="f_r"><a href="{$MODULE[2][linkurl]}ad.php?action=add" class="m">购买</a></span><a href="{$MODULE[2][linkurl]}ad.php" class="{if $MG[ad]}n{else}f{/if}">广告预定</a></li>
			{/if}
		</ul>
	</div>
{/if}


{if $_userid || $show_menu}
	<div class="side_head" onclick="c(2);"><div><img src="image/arrow_o.gif" width="16" height="16" align="right" alt="" id="I_2"/>交易管理</div></div>
	<div class="side_body" id="D_2" style="display:none;">
		<ul>
			
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="trade"><span class="f_r"><a href="{$MODULE[2][linkurl]}trade.php?action=pay" class="m">付款</a></span><a href="{$MODULE[2][linkurl]}trade.php" class="{if $_userid}n{else}f{/if}">我的订单</a></li>
			

			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="record"><a href="{$MODULE[2][linkurl]}record.php" class="{if $_userid}n{else}f{/if}">{$DT[money_name]}流水</a></li>

			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="charge"><span class="f_r"><a href="{$MODULE[2][linkurl]}charge.php?action=pay" class="m">充值</a></span><a href="{$MODULE[2][linkurl]}charge.php?action=record" class="{if $_userid}n{else}f{/if}">充值记录</a></li>

			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="cash"><span class="f_r"><a href="{$MODULE[2][linkurl]}cash.php" class="m">提现</a></span><a href="{$MODULE[2][linkurl]}cash.php?action=record" class="{if $_userid}n{else}f{/if}">{$DT[money_name]}提现</a></li>

			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="credit"><span class="f_r"><a href="{$MODULE[2][linkurl]}credit.php?action=buy" class="m">购买</a></span><a href="{$MODULE[2][linkurl]}credit.php" class="{if $_userid}n{else}f{/if}">{$DT[credit_name]}管理</a></li>		
		</ul>
	</div>
{/if}

{if $MG[homepage] || $show_menu}
	<div class="side_head" onclick="c(3);"><div><img src="image/arrow_o.gif" width="16" height="16" align="right" alt="" id="I_3"/>商铺管理</div></div>
	<div class="side_body" id="D_3" style="display:none;">
		<ul>
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="homepage"><span class="f_r"><a href="{$MODULE[2][linkurl]}style.php" class="m">模板</a></span><a href="{$MODULE[2][linkurl]}home.php" class="{if $MG[homepage]}n{else}f{/if}">商铺设置</a></li>

			{if ($MG[news_limit]>-1 && $MG[homepage]) || $show_menu}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="news"><span class="f_r"><a href="{$MODULE[2][linkurl]}news.php?action=add" class="m">发布</a></span><a href="{$MODULE[2][linkurl]}news.php" class="{if $MG[news_limit]>-1 && $MG[homepage]}n{else}f{/if}">公司新闻</a></li>
			{/if}

			{if ($MG[page_limit]>-1 && $MG[homepage]) || $show_menu}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="page"><span class="f_r"><a href="{$MODULE[2][linkurl]}page.php?action=add" class="m">添加</a></span><a href="{$MODULE[2][linkurl]}page.php" class="{if $MG[page_limit]>-1 && $MG[homepage]}n{else}f{/if}">公司单页</a></li>
			{/if}

			{if ($MG[honor_limit]>-1 && $MG[homepage]) || $show_menu}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="honor"><span class="f_r"><a href="{$MODULE[2][linkurl]}honor.php?action=add" class="m">添加</a></span><a href="{$MODULE[2][linkurl]}honor.php" class="{if $MG[honor_limit]>-1 && $MG[homepage]}n{else}f{/if}">荣誉资质</a></li>
			{/if}

			{if ($MG[link_limit]>-1 && $MG[homepage]) || $show_menu}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="link"><span class="f_r"><a href="{$MODULE[2][linkurl]}link.php?action=add" class="m">添加</a></span><a href="{$MODULE[2][linkurl]}link.php" class="{if $MG[link_limit]>-1 && $MG[homepage]}n{else}f{/if}">友情链接</a></li>
			{/if}
		</ul>
	</div>
{/if}
{if $_userid || $show_menu}
	<div class="side_head" onclick="c(4);"><div><img src="image/arrow_o.gif" width="16" height="16" align="right" alt="" id="I_4"/>资料管理</div></div>
	<div class="side_body" id="D_4" style="display:none;">
		<ul>
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="edit"><span class="f_r"><a href="{$MODULE[2][linkurl]}edit.php?tab=1" class="m">密码</a></span><a href="{$MODULE[2][linkurl]}edit.php" class="{if $_userid}n{else}f{/if}">修改资料</a></li>
			{if $MG[address_limit]>-1 || $show_menu}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="address"><span class="f_r"><a href="{$MODULE[2][linkurl]}address.php?action=add" class="m">添加</a></span><a href="{$MODULE[2][linkurl]}address.php" class="{if $MG[address_limit]>-1}n{else}f{/if}">收货地址</a></li>
			{/if}
			{if $show_oauth}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="oauth"><span class="f_r"><a href="{$MODULE[2][linkurl]}oauth.php" class="m">绑定</a></span><a href="{$MODULE[2][linkurl]}oauth.php" class="{if $_userid}n{else}f{/if}">一键登录</a></li>
			{/if}
			<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="logout"><a href="{$MODULE[2][linkurl]}logout.php?forward=" class="{if $_userid}n{else}f{/if}">退出登录</a></li>
		</ul>
	</div>
{/if}
	<div id="powered">
	<div><a href="http://www.destoon.com" target="_blank">Powered by Destoon B2B System</a></div>
	<a href="http://www.destoon.com" target="_blank">&copy; 2008-2011 Destoon.com<br/>
	All rights reserved</a>
	</div>

</td>
<td class="side_h" onclick="oh(this);" title="点击展开/隐藏侧栏" id="side_oh">&nbsp;</td>
<td valign="top" class="main" id="main">

	<?php echo $content; ?>
	
</td>
</tr>
</table>
<script type="text/javascript">
if(document.body.clientHeight-85 > Dd('main').scrollHeight) Dd('main').style.height=(document.body.clientHeight-85)+'px';
{if $_message && $_sound}document.write(sound('message_{$_sound}'));{/if}
{if $_chat}document.write(sound('chat_new'));{/if}
if(get_cookie('m_side') == 11 && Dd('side_oh').className == 'side_h') {Dh('side');Dd('side_oh').className = 'side_s';}
</script>
</body>
</html>