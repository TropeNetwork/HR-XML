<?php
// $Id: prefs.php,v 1.1.1.1 2003/02/03 16:24:21 cbleek Exp $

$prefGroups['language'] = array(
    'column' => _("Your Information"),
    'label' => _("Language"),
    'desc' => _("Set your preferred display language."),
    'members' => array('language')
);

$prefGroups['display'] = array(
    'column' => _("Other Options"),
    'label' => _("Display Options"),
    'desc' => _("Change display options such as the color scheme and how search results are sorted."),
    'members' => array('sortby', 'sortdir', 'comment_sort_dir', 'whups_default_view', 'summary_show_requested', 'summary_show_ticket_numbers', 'report_time_format', 'show_days_ago', 'autolink_tickets')
);

$prefGroups['notification'] = array(
    'column' => _("Other Options"),
    'label' => _("Notification Options"),
    'desc' => _("Change options for email notifications of ticket activity."),
    'members' => array('email_others_only'));

// user language
$_prefs['language'] = array(
    'value' => '',
    'locked' => false,
    'shared' => true,
    'type' => 'select',
    'desc' => _("Select your preferred language:")
);
?>