<?php

require_once HORDE_BASE . '/lib/Notification.php';

/**
 * The Notification_smarty:: class provides functionality for pushing
 * messages from the message stack into the page slots.
 *
 * $Id: smarty.php,v 1.1.1.1 2003/02/03 16:24:20 cbleek Exp $
 *
 * Copyright 2003 Carsten Bleek <carsten@bleek.de>
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 */
class Notification_smarty extends Notification {

    /**
     * Constructor
     *
     * @access public
     */
    function Notification_smarty()
    {
        /* Populate the $_handles array. */
        $this->_handles = array(
            'horde.error'   => array('alerts/error.gif',   _("Error")),
            'horde.success' => array('alerts/success.gif', _("Success")),
            'horde.warning' => array('alerts/warning.gif', _("Warning")),
            'horde.message' => array('alerts/message.gif', _("Message"))
        );
    }

    /**
     * Outputs the status line if there are any messages on the 'status'
     * message stack.
     *
     * @access public
     *
     * @param array &$messageStack     The stack of messages.
     * @param optional array $options  An array of options.
     *                                 Options: 'nospace'
     */
    function notify(&$messageStack, $options = array())
    {
        $smarty = new Smarty_OpenHR;

        if (count($messageStack['status'])) {
            while ($message = array_shift($messageStack['status'])) {
                $array[]=$this->getMessage($message);
            }
            if (!array_key_exists('nospace', $options) ||
                !$options['nospace']) {
            }
            $smarty->assign("message",$array);
        }

        $page = &Page::singleton();
        $element = &$page->addElement("text");
        $element->setSlot("content", $smarty->fetch("message.tpl"));
        $element->setPosition(0,0);       
    }

    /**
     * Outputs one message.
     *
     * @access public
     *
     * @param array $message  One message hash from the stack.
     */
    function getMessage($message)
    {
        global $registry;
        return array("image"=>Horde::img($this->_handles[$message['type']][0],
                                         'alt="'.$this->_handles[$message['type']][1].'" class="control"', 
                                         $registry->getParam('graphics','horde')),
                     "text" =>$message['message']);
    }

}