{config_load file=smarty.conf section="setup"}
{include file="header.tpl" title="OpenHR Homepage"}
<h1>Login to the OpenHR Project</h1>
<br>
<form action="{$action}" method="POST">
<table>
<tr><td>Username:</td><td><input type="text" name="horde_user"></td></tr>
<tr><td>Passsword:</td><td><input type="password" name="horde_pass"></td></tr>
<tr><td colspan="2">
<input type="submit" value="Login">
</td></tr>
</table>
</form>
{include file="footer.tpl"}
