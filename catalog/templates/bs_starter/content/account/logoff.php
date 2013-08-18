<?php
/**
  @package    catalog::templates::content
  @author     Loaded Commerce, LLC
  @copyright  Copyright 2003-2013 Loaded Commerce Development Team
  @copyright  Portions Copyright 2003 osCommerce
  @copyright  Template built on DevKit http://www.bootstraptor.com under GPL license 
  @license    https://github.com/loadedcommerce/loaded7/blob/master/LICENSE.txt
  @version    $Id: logoff.php v1.0 2013-08-08 datazen $
*/
?>
<!--content/account/logoff.php start-->
<div class="row-fluid">
  <div class="span12">
    <h1><?php echo $lC_Template->getPageTitle(); ?></h1>
    <p><?php echo $lC_Language->get('sign_out_text'); ?></p>
    <div class="button-set">
      <a href="<?php echo lc_href_link(FILENAME_DEFAULT); ?>"><button class="pull-right btn btn-lg btn-success" type="button"><?php echo $lC_Language->get('button_continue'); ?></button></a>
    </div>           
  </div>
</div>
<!--content/account/logoff.php end-->