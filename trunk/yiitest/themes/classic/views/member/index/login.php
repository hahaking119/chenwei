<style type="text/css">
.tips {position:absolute;z-index:100;width:300px;background:url('image/tips_bg.gif') no-repeat 0 bottom;overflow:hidden;margin:-5px 0 0 -10px;}
.tips div{background:url('image/tips_top.gif') no-repeat;line-height:22px;padding:8px 10px 8px 35px;}
</style>
<br/>
<div class="m">
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<td width="20">&nbsp;</td>
	<td width="300"><img src="{DT_SKIN}image/login_h.gif" alt="" width="300" height="35"/></td>
	<td>&nbsp;</td>
	</tr>
	</table>
</div>
<div class="m">
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr bgcolor="#2D92DA">
	<td width="20"> </td>
	<td width="300" bgcolor="#FFFFFF" background="{DT_SKIN}image/login_b.gif">

		<form method="post" action="{$DT[file_login]}"  onsubmit="return Dcheck();">
		<input name="forward" type="hidden" id="forward" value="{$forward}">
		<table width="290" cellpadding="3" cellspacing="3" align="right">
		<tr>
		<td colspan="2" class="f_gray">您尚未登录，或者访问了一个需要登录的页面..</td>
		</tr>
		<tr onmouseover="Ds('tusername');" onmouseout="Dh('tusername');">
		<td align="right">
		<select name="option">
			<option value="username">用户名</option>
			{if $MOD[passport]}<option value="passport">通行证</option>{/if}
			<option value="email">Email</option>
			<option value="mobile">手机号</option>
			<option value="company">公司名</option>
			<option value="userid">会员ID</option>
		</select>
		</td>
		<td><input name="username" type="text" id="username" value="{$username}" style="width:140px"/></td>
		<td>
			<div class="tips" id="tusername" style="display:none;">
				<div>如果忘记了用户名，请在左侧选择其他登录名称<br/>例如Email、手机号、公司名等</div>
			</div>
		</td>
		</tr>
		<tr onmouseover="Ds('tpassword');" onmouseout="Dh('tpassword');">
		<td align="right">密 码：</td>
		<td>{template 'password', 'chip'}</td>
		<td>
			<div class="tips" id="tpassword" style="display:none;">
				<div>如果忘记了密码，请<a href="send.php" class="f_b">点击这里</a>自主找回或联系本站工作人员协助找回</div>
			</div>
		</td>
		</tr>
		{if $MOD[captcha_login]}
		<tr>
		<td align="right">验证码：</td>
		<td>{template 'captcha', 'chip'}</td>
		<td></td>
		</tr>
		{/if}
		<tr>
		<td align="right"></td>
		<td><span title="选中后 一月内不用再次登录 网吧或公共计算机请勿选"><input type="checkbox" name="cookietime" value="2592000" id="cookietime"{if $MOD[login_remember]} checked{/if}/><label for="cookietime">记住我</label></span>
		<span title="选中后 将直接进入商务室 不返回登录前的页面"><input type="checkbox" name="goto" value="1" id="goto"{if $MOD[login_goto]} checked{/if}/><label for="goto">进入商务室</label></span>
		</td>
		<td></td>
		</tr>
		<tr>
		<td></td>
		<td><input type="submit" name="submit" value=" 登 录 "/>&nbsp;&nbsp;<a href="send.php">忘记了密码？</a>
		</td>
		<td></td>
		</tr>
		{if $oa}
		<tr>
		<td align="right">其他登录：</td>
		<td>
		{loop $OAUTH $k $v}
		{if $v[enable]}<a href="{DT_PATH}api/oauth/{$k}/connect.php" title="{$v[name]}"><img src="{DT_PATH}api/oauth/{$k}/ico.png" alt="{$v[name]}"/></a> &nbsp;{/if}
		{/loop}
		</td>
		<td></td>
		</tr>
		{/if}
		</form>
		</table>
	</td>
	<td width="20">&nbsp;</td>
	<td bgcolor="#FFFFFF" width="350" valign="top"><img src="{DT_SKIN}image/login_say.gif" alt="" width="350" height="140"/></td>
	<td width="30">&nbsp;</td>
	<td class="f_white" style="line-height:180%;">
	还没有会员账号?<br/>立即免费注册一个(仅需要大约1分钟)...<br/><br/>
	<input type="button" value=" 立即免费注册 " class="pd3 px14 f_b ls1" style="background:#F8B003;" onclick="window.location='{$DT[file_register]}?forward={urlencode($forward)}';"/>
	</td>
	</tr>
	</table>
</div>
<div class="m">
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<td width="20">&nbsp;</td>
	<td width="300"><img src="{DT_SKIN}image/login_f.gif" alt="" width="300" height="25"/></td>
	<td>&nbsp;</td>
	</tr>
	</table>
</div>
<br/>
<br/>
<script type="text/javascript">
if(Dd('username').value == '') {
	Dd('username').focus();
} else {
	Dd('password').focus();
}
function Dcheck() {
	if(Dd('username').value == '') {
		confirm('请输入登录名称');
		Dd('username').focus();
		return false;
	}
	if(Dd('password').value == '') {
		confirm('请输入密码');
		Dd('password').focus();
		return false;
	}
{if $MOD[captcha_login]}
	if(!is_captcha(Dd('captcha').value)) {
		confirm('请填写验证码');
		Dd('captcha').focus();
		return false;
	}
{/if}
}
</script>