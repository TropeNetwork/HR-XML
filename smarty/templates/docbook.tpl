{config_load file=smarty.conf section="setup"}
{include file="header.tpl" title="OpenHR Homepage"}
{popup_init src="/js/overlib.js"}
<b><font size="4">{$page.title}</font></b>
<br>{$page.description}
<table bolder="1" colspan="5"><tr width="100%"><td>
{$page.content}
</td></tr></table>
{include file="footer.tpl"}
