<html>
<head>
<title>{$page.title} - {$page.location}</title>
<link rel="stylesheet" href="/jobs/css/style.css">
<script src="/jobs/js/TreeMenu.js" language="JavaScript" type="text/javascript"></script>
{* {include_php file="Javascript.php"} *}
</head>
<body bgcolor="#ffffff" background="/jobs/images/prototype.gif">

<center><font class="demo">This is a DEMO. All entered data are regularly deleted!</font></center>

{literal}
<script language="JavaScript" type="text/javascript">
<!--
function open_help_win(module, topic)
{
    var win_location;
    var screen_width, screen_height;
    var win_top, win_left;
    var HelpWin;

    screen_height = 0;
    screen_width = 0;
    win_top = 0;
    win_left = 0;

    var help_win_width = 300;
    var help_win_height = 300;

    if (window.innerWidth) screen_width = window.innerWidth;
    if (window.innerHeight) screen_height = window.innerHeight;

    win_location = '/horde/help.php?1=1';
    if (topic == null) {
        win_location += '&module=' + module;
    } else if (topic == "") {
        win_location += '&module=' + module + '&show=topics';
    } else {
        win_location += '&module=' + module + '&topic=' + topic;
    }

    win_top  = screen_height - help_win_height - 20;
    win_left = screen_width  - help_win_width  - 20;
    HelpWin  = window.open(
        win_location,
        'HelpWindow',

'width='+help_win_width+',height='+help_win_height+',top='+win_top+',left='+win_left
    );
    HelpWin.focus();
}
//-->
</script>
{/literal}

<table border="0" colspacing="0" colpadding="0" width="100%">
<table border="1">
<tr>
  <td>
    <h1>OpenHR</h1>
    <img src="/jobs/images/spacer.gif" width="170" height="1" border="0">
  </td>
  <td width="100%" colspan="1" align="right" class="menuTop">
    <fieldset><legend align="center">menu top</legend>
      <table><tr><td align="left">
      {include_php file="MenuTop.php"}
      </td></tr></table>
    </fieldset>  
  </td>
</tr>

<tr>
  <td width="230" valign="top" class="menuLeft">
    <fieldset><legend align="center">menu left</legend>
      {include_php file="MenuLeft.php"}
    </fieldset>
  </td>
<td valign="top">

{if isset($message)}{include file="message.tpl"}{/if}

{if $page.errno > 0}

{include file="error.tpl"}

{/if}
