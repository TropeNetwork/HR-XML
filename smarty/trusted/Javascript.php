<?php

print <<<EOF
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
//-->
</script>

<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

EOF;

// Include dynamic style sheet.
echo '<style type="text/css">'."\n  <!--\n";
include_once( OPENHR_LIB.'TreeMenu/ccSiteStyle.css.php' );
echo "\n  -->\n</style>\n";

print <<<EOF
<script type="text/javascript" language="JavaScript">
// Bust my page out of any frames
  if (top != self) top.location.href = location.href;
</script>
</head>
EOF;
?>
