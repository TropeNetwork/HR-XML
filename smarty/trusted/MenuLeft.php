<?php

require_once( 'HTML/TreeMenu.php' );

print MenuLeft::Left();

class MenuLeft{

    function Left(){
        global $registry;

        $nodeProperties = array("text"=>_("Project"),
                                "link"=> "/");
        $pgmenuTop  = new HTML_TreeNode($nodeProperties);


        $pgmenu     = new HTML_TreeMenu();
        $pgmenu->addItem($pgmenuTop);


        $nx = &$pgmenuTop->addItem(new HTML_TreeNode
           (
            array("text" =>_("Home"), 
                  "link" =>$registry->getParam('webroot').'/#intro',
                  "icon"=>"icons/home.gif"))
           );

        $nx = &$pgmenuTop->addItem(new HTML_TreeNode(array("text"=>_("Jobs"),
                                                           "link"=>$registry->getParam('webroot').'/jobs/')));

        $nx->addItem(new HTML_TreeNode(array("text"=>_("create new job"),
                                             "link"=> $registry->getParam('webroot').'/jobs/?reason=create')));
        $nx->addItem(new HTML_TreeNode(array("text"=>_("administrate jobs"),
                                             "link"=> $registry->getParam('webroot').'/jobs/admin.php')));
        $nx->addItem(new HTML_TreeNode(array("text"=>_("statistics"),
                                             "link"=> $registry->getParam('webroot').'/jobs/')));
        $nx = &$pgmenuTop->addItem(new HTML_TreeNode(array("text"=>_("Applications"), 
                                                           "link"=> $registry->getParam('webroot').'/#history')));  
        $nx->addItem(new HTML_TreeNode(array("text"=>_("administrate"),
                                             "link"=> $registry->getParam('webroot').'/')));
        $nx->addItem(new HTML_TreeNode(array("text"=>_("statistics"),
                                             "link"=> $registry->getParam('webroot').'/#summary_of_new_features')));

        $pgmenuTop->addItem(new HTML_TreeNode(array("text"=>_("personal data"),
                                                    "link"=> $registry->getParam('webroot').'/person.php')));
        $pgmenuTop->addItem(new HTML_TreeNode(array("text"=>_("account data"),
                                                    "link"=> $registry->getParam('webroot').'/account.php')));
        $nx = &$pgmenuTop->addItem(new HTML_TreeNode(array("text"=>_("company data"),
                                                           "link"=> $registry->getParam('webroot').'/company.php')));

        $user=$GLOBALS["user"];
        if (Auth::getAuth() && $user->getCompany()){
            $nx->addItem(new HTML_TreeNode(array("text"=>_("company users"),
                                                 "link"=> $registry->getParam('webroot').'/register.php')));
            $nx->addItem(new HTML_TreeNode(array("text"=>_("users list"),
                                                 "link"=> $registry->getParam('webroot').'/user.php')));
        }

        // Create the presentation object
 

    /**
    *  o images            -  The path to the images folder. Defaults to "images"
    *  o linkTarget        -  The target for the link. Defaults to "_self"
    *  o defaultClass      -  The default CSS class to apply to a node. Default is none.
    *  o usePersistence    -  Whether to use clientside persistence. This persistence
    *                         is achieved using cookies. Default is true.
    *  o noTopLevelImages  -  Whether to skip displaying the first level of images if
    *                         there is multiple top level branches.
    **/
        $pgmenuTree = &new HTML_TreeMenu_DHTML($pgmenu,
                                         array('images'       => '/jobs/images/TreeMenu',
                                               'defaultClass' => 'smalltext'));
        $pgmenuTree->printMenu();
    }
}
?>