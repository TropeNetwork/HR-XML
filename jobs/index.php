<?php

require_once('../prepend.inc');
require_once(OPENHR_LIB.'/Form.php');
require_once(OPENHR_LIB.'/Job.php');

define("JOB_PREVIEW" , "preview");
define("JOB_CREATE"  , "create");

if (!isset($_SESSION["reason"]) || empty($_POST)) $_SESSION["reason"] = JOB_PREVIEW;

// page is assigned by reference to each template
Page::setSlot("title",       _("OpenHR"));
Page::setSlot("location",    _("Create new Job"));
Page::setSlot("description", _("Please fill out the form to create a new Job."));

if (!Auth::getAuth()) Page::Error(_("you have to log in to use this service"));

if ($user->getCompany() == 0){
    $notification->push(_("In order to create jobads you have to enter general company data first"));
    $notification->notify();
    $smarty->assign("page",Page::getSlots());
    $smarty->display('generic.tpl');
    exit;
}


$form = new Form('jobad','POST');

// default formular:

$form->addElement('text', 'job_title', _("Title of Job"));
$form->addElement('text', 'job_location', _("Location"));
$form->addElement('textarea', 'job_description', _("Description"));

$element = &$form->getElement('job_description');
$element->setCols(50);
$element->setRows(5);
$element->setWrap("yes");

$element = &$form->getElement('job_title');
$element->setSize(50);
$element->setMaxLength(60);

$form->addElement('submit', 'preview', _("Preview"));
$form->addElement('reset' , 'reset', _("Reset"));


/*
* define validating rules 
*/
$form->addRule('job_title', 'Please enter the title of the job', 'required');

if ($form->validate()) {
    // create new account
    
    $element = &$form->getElement('preview');
    $element->setValue(_("Save"));

    if (isset($_SESSION["reason"]) && $_SESSION["reason"] == JOB_PREVIEW ){
        $_SESSION["reason"] = JOB_CREATE;
        Page::setSlot("description",_("Is the job OK now?"));
        $form->freeze();
    }elseif(isset($_SESSION["reason"]) && $_SESSION["reason"] == JOB_CREATE ){
        Page::setSlot("description",_("The job was saved now!"));
        unset($_SESSION["reason"]);
        Job::addJob($form->getSubmitValues());
    }else{
        trigger_error("unknown submit reason - ".$_SESSION["reason"],E_USER_NOTICE);
    }
} else {
    if (empty($_POST)){
        Page::setSlot("description",_("please fill out the job formular"));
    }else{
        Page::setSlot("description",_("some formular fields are containing errors"));
    }
}

$element=&Page::addElement("text");
$element->setSlot("content",Page::useTemplate("jobs/generic.tpl",$form->toArray()));

$smarty->assign("page",Page::getSlots());
$smarty->display('generic.tpl');

?>