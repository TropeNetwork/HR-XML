{config_load file=smarty.conf section="setup"}
{include file="header.tpl" title="OpenHR Homepage"}
{popup_init src="/js/overlib.js"}
<h1>OpenHR</h1>
Test with a small <A href="/" {popup text="This link takes you to my page!"}>POPUP</A>

Test with a complex<A href="/" {popup sticky=true caption="mypage contents" text="<UL><LI>links<LI>pages<LI>images</UL>" snapx=10
snapy=10}>PopoUP</A>
<br>
test Umlaute הצהצü

{include file="footer.tpl"}
