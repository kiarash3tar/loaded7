<?php
/**
  @package    catalog::templates::content
  @author     Loaded Commerce
  @copyright  Copyright 2003-2014 Loaded Commerce, LLC
  @copyright  Portions Copyright 2003 osCommerce
  @copyright  Template built on DevKit http://www.bootstraptor.com under GPL license 
  @license    https://github.com/loadedcommerce/loaded7/blob/master/LICENSE.txt
  @version    $Id: cart.js.php v1.0 2013-08-08 datazen $
*/
global $lC_Language, $lC_Currencies; 
?>
<script>
function deleteItem(id) {
  var jsonLink = '<?php echo lc_href_link('rpc.php', 'checkout&action=deleteItem&item=ITEM', 'AUTO'); ?>';   
  $.getJSON(jsonLink.replace('ITEM', id).split('amp;').join(''),
    function (data) {
      if (data.rpcStatus != 1) {
        alert('<?php echo $lC_Language->get('ms_error_action_not_performed'); ?>');
        return false;
      }
      if (data.redirect == '1') {
        window.location = location.href;
      }
      $('#tr-' + id).remove();
      $('#content-shopping-cart-order-totals-right').html(data.otText);
    }
  );
}

function getShippingEstimates(postal_code) {
  var jsonLink = '<?php echo lc_href_link('rpc.php', 'checkout&action=getShippingEstimates&postal_code=POSTAL_CODE', 'AUTO'); ?>';   
  $.getJSON(jsonLink.replace('POSTAL_CODE', postal_code).split('amp;').join(''),
    function (data) {
      if (data.rpcStatus != 1) {
        alert('<?php echo $lC_Language->get('ms_error_action_not_performed'); ?>');
        return false;
      }
      $('#content_shopping_cart_esitmation_shipping').html('');
      $('#content_shopping_cart_esitmation_shipping').html('<div class="col-sm-8 col-lg-8"></div>'+
                                                           '<div class="col-sm-4 col-lg-4">'+
                                                           '  <span class="pull-left">Shipping (32226): <span onclick="removeShippingEstimates();" class="glyphicon glyphicon-remove-circle red"></span></span><span class="pull-right no-margin-right">$8.50</span>'+
                                                           '</div>');
    }
  );
}

function removeShippingEstimates() {
  var jsonLink = '<?php echo lc_href_link('rpc.php', 'checkout&action=removeShippingEstimates', 'AUTO'); ?>';   
  $.getJSON(jsonLink.split('amp;').join(''),
    function (data) {
      if (data.rpcStatus != 1) {
        alert('<?php echo $lC_Language->get('ms_error_action_not_performed'); ?>');
        return false;
      }
      $('#content_shopping_cart_esitmation_shipping').html('');
      $('#content_shopping_cart_esitmation_shipping').html('<div class="col-sm-12 col-lg-12">'+
                                                           '  <span class="pull-right"><button onclick="getShippingEstimates($(\'#shopping_cart_esitmation_shipping_postal_code\').val());" class="btn btn-inverse small-margin-left"><?php echo $lC_Language->get('button_go'); ?></button></span>'+
                                                           '  <span class="pull-right"><input id="shopping_cart_esitmation_shipping_postal_code" type="text" class="form-control small-margin-left"></span>'+
                                                           '  <span class="pull-right with-small-padding"><?php echo $lC_Language->get('text_shopping_cart_estimation_postal_code'); ?></span>'+
                                                           '</div>');
    }
  );
}
</script>