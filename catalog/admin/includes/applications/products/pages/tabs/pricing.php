<?php
/**
  @package    catalog::admin::applications
  @author     Loaded Commerce
  @copyright  Copyright 2003-2014 Loaded Commerce, LLC
  @copyright  Portions Copyright 2003 osCommerce
  @copyright  Template built on Developr theme by DisplayInline http://themeforest.net/user/displayinline under Extended license 
  @license    https://github.com/loadedcommerce/loaded7/blob/master/LICENSE.txt
  @version    $Id: pricing.php v1.0 2013-08-08 datazen $
*/
global $lC_Language, $lC_Currencies, $pInfo; 
?>
<div id="section_pricing_content" class="with-padding">
  <fieldset class="fieldset fields-list" style="padding-bottom:0;">
    <legend class="legend"><?php echo $lC_Language->get('text_pricing_overrides'); ?></legend>
    
    <div class="field-block button-height">
      <label for="products_base_price" class="label"><b><?php echo $lC_Language->get('text_base_price'); ?></b></label>
      <div class="inputs" style="display:inline; padding:8px 0;">
        <span class="mid-margin-left no-margin-right"><?php echo $lC_Currencies->getSymbolLeft(); ?></span>
        <input type="text" onfocus="this.select();" onchange="updatePricingDiscountDisplay();" class="input-unstyled" name="products_base_price" id="products_base_price" value="<?php echo (isset($pInfo) ? number_format(lc_round($pInfo->get('products_price'), DECIMAL_PLACES), DECIMAL_PLACES) : null); ?>" class="input strong" onblur="$('#products_price0').val(this.value);" />
      </div>    
      <?php echo lc_show_info_bubble($lC_Language->get('info_bubble_pricing_base_price'), null, 'info-spot on-left grey margin-left'); ?>
    </div>

    <div class="upsellwrapper field-block field-block-product button-height">
      <?php if (utility::isPro() === false || utility::isB2B() === false) { ?>
        <label upselltitle="<?php echo $lC_Language->get('text_group_pricing'); ?>" upselldesc="<?php echo $lC_Language->get('text_group_pricing_desc'); ?>" for="" class="label upsellinfo"><b><?php echo $lC_Language->get('text_group_pricing'); ?></b></label>
      <?php } ?>
      <label for="groups_pricing_switch" class="label"><b><?php echo $lC_Language->get('text_group_pricing'); ?></b></label>
      <input id="groups_pricing_switch" name="groups_pricing_switch" type="checkbox" class="switch wider" onchange="togglePricingSection(this, 'groups_pricing_container');" data-text-off="<?php echo $lC_Language->get('slider_switch_disabled'); ?>" data-text-on="<?php echo $lC_Language->get('slider_switch_preview'); ?>" /><?php echo lc_show_info_bubble($lC_Language->get('info_bubble_pricing_group_pricing'), null, 'info-spot on-left grey margin-left'); ?>
      <div onclick="togglePricingSection(this, 'groups_pricing_container');" style="cursor:pointer;" class="field-block-chevron-container float-right"><span id="groups_pricing_container_span" class="icon-chevron-thin-down icon-size2"></span></div>
    </div>
    <div id="groups_pricing_container" class="field-drop button-height black-inputs" style="display:none;">
      <?php echo lC_Products_Admin::getGroupPricingContent(isset($pInfo) ? $pInfo->get('products_price') : null); ?>
    </div>    
    
    <!--VQMOD PRICING-1 HOOK POINT - Do Not Change or Remove-->
    
    <?php 
    if ($pInfo) { 
      ?>
      <div class="field-block field-block-product button-height">
        <label for="specials_pricing_switch" class="label"><b><?php echo $lC_Language->get('text_special_pricing'); ?></b></label>
        <input id="specials_pricing_switch" name="specials_pricing_switch" onchange="togglePricingSection(this, 'specials_pricing_container');" type="checkbox" class="switch wider specials-pricing" data-text-off="<?php echo $lC_Language->get('slider_switch_disabled'); ?>" data-text-on="<?php echo $lC_Language->get('slider_switch_enabled'); ?>"<?php echo (isset($pInfo) && ($pInfo->get('products_special_price') != null) ? ' checked' : ''); ?> /><?php echo lc_show_info_bubble($lC_Language->get('info_bubble_pricing_specials'), null, 'info-spot on-left grey margin-left margin-right'); ?>
        <div onclick="togglePricingSection(this, 'specials_pricing_container');" style="cursor:pointer;" class="field-block-chevron-container float-right"><span id="specials_pricing_container_span" class="icon-chevron-thin-down icon-size2"></span></div>
      </div>
      <div id="specials_pricing_container" class="field-drop button-height black-inputs no-margin-bottom"<?php echo (isset($pInfo) && ($pInfo->get('products_special_price') != null) ? ' style="display:block;"' : ' style="display:none;"'); ?>>
        <?php echo lC_Products_Admin::getSpecialPricingContent(); ?>
      </div>
      <?php 
    } 
    ?>                
  </fieldset>     
  <fieldset class="fieldset large-margin-top">
    <legend class="legend"><?php echo $lC_Language->get('text_options_pricing'); ?></legend>  
    <dl id="simple-options-pricing-tab" class="accordion">
      <?php echo lC_Products_Admin::getOptionsPricingContent(); ?>
    </dl>     
  </fieldset>
</div> 