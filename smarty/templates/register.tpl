{config_load file=smarty.conf section="setup"}
{include file="header.tpl" title="OpenHR Homepage"}

<h1>Registration</h1>
<br>
<form action="/register.php" method="POST">
<table>
<tr><td>Salutation:</td>
<td>
  Mrs.<input type="radio" name="salutation" value="f">
  Mr.<input type="radio" name="salutation" value="m">
</td>
</tr>
<tr><td>Firstname:</td><td><input type="text" name="firstname" value="{$form.value.firstname}"></td></tr>
<tr><td>Lastname:</td><td><input type="text" name="lastname"></td></tr>
<tr><td>Email:</td><td><input type="text" name="email"></td></tr>
<tr><td>Password:</td><td><input type="password" name="password"></td></tr>
<tr><td>confirm Password:</td><td><input type="password" name="password_confirmed"></td></tr>
<tr><td colspan="2">
<input type="submit" value="Register">
</td></tr>
</table>
</form>
{include file="footer.tpl"}
