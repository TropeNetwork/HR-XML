<?php
/*
 * $Id: conf.php,v 1.1.1.1 2003/02/03 16:24:21 cbleek Exp $
 *
 * Copyright 2003 Carsten Bleek <carsten@bleek.de>
 *
 */


$array=parse_ini_file(FILE_INI);

// What storage driver should we use?  Valid values are 'sql'.
$conf['driver']['type']  = 'sql';
$conf['sql']['phptype']  = 'mysql';
$conf['sql']['protocol'] = 'tcp';
$conf['sql']['hostspec'] = $array["db_jobs_host"];
$conf['sql']['username'] = $array["db_jobs_user"];
$conf['sql']['password'] = $array["db_jobs_password"];
$conf['sql']['database'] = $array["db_jobs_database"];
$conf['sql']['charset']  = 'iso-8859-1';


$conf['auth']['driver'] = 'sql';
#$conf['auth']['params']['table']    = 'horde_users';

?>