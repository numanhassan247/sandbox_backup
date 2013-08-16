<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:14
         compiled from CoreHome/templates/sites_selection.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'CoreHome/templates/sites_selection.tpl', 19, false),)), $this); ?>
<?php ob_start(); ?>
<div class="custom_select_all" style="clear: both">
	<a href="#" <?php if (isset ( $this->_tpl_vars['showAllSitesItem'] ) && $this->_tpl_vars['showAllSitesItem'] == false): ?>style="display:none;"<?php endif; ?>>
		<?php if (isset ( $this->_tpl_vars['allSitesItemText'] )): ?><?php echo $this->_tpl_vars['allSitesItemText']; ?>
<?php else: ?><?php echo ((is_array($_tmp='General_MultiSitesSummary')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
<?php endif; ?>
	</a>
</div>
<?php $this->_smarty_vars['capture']['sitesSelector_allWebsitesLink'] = ob_get_contents();  $this->assign('sitesSelector_allWebsitesLink', ob_get_contents());ob_end_clean(); ?>
<div class="sites_autocomplete" <?php if (isset ( $this->_tpl_vars['siteSelectorId'] )): ?>id="<?php echo $this->_tpl_vars['siteSelectorId']; ?>
"<?php endif; ?>
	<?php if (! isset ( $this->_tpl_vars['switchSiteOnSelect'] ) || $this->_tpl_vars['switchSiteOnSelect'] == true): ?>data-switch-site-on-select="1"<?php endif; ?>>
    <div class="custom_select">
    
        <a href="#" onclick="return false" class="custom_select_main_link" siteid="<?php if (isset ( $this->_tpl_vars['idSite'] )): ?><?php echo $this->_tpl_vars['idSite']; ?>
<?php else: ?><?php echo $this->_tpl_vars['sites'][0]['idsite']; ?>
<?php endif; ?>"><?php if (isset ( $this->_tpl_vars['siteName'] )): ?><?php echo $this->_tpl_vars['siteName']; ?>
<?php else: ?><?php echo $this->_tpl_vars['sites'][0]['name']; ?>
<?php endif; ?></a>
        
        <div class="custom_select_block">
            <?php if (isset ( $this->_tpl_vars['allWebsitesLinkLocation'] ) && $this->_tpl_vars['allWebsitesLinkLocation'] == 'top'): ?>
            <?php echo $this->_tpl_vars['sitesSelector_allWebsitesLink']; ?>

            <?php endif; ?>
            <div class="custom_select_container">
            <ul class="custom_select_ul_list" >
                <?php $_from = $this->_tpl_vars['sites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
                    <li <?php if (( ! isset ( $this->_tpl_vars['showSelectedSite'] ) || $this->_tpl_vars['showSelectedSite'] == false ) && $this->_tpl_vars['idSite'] == $this->_tpl_vars['info']['idsite']): ?> style="display: none"<?php endif; ?>><a href="#" siteid="<?php echo $this->_tpl_vars['info']['idsite']; ?>
"><?php echo $this->_tpl_vars['info']['name']; ?>
</a></li>
				<?php endforeach; endif; unset($_from); ?>
            </ul>
            </div>
            <?php if (! isset ( $this->_tpl_vars['allWebsitesLinkLocation'] ) || $this->_tpl_vars['allWebsitesLinkLocation'] == 'bottom'): ?>
            <?php echo $this->_tpl_vars['sitesSelector_allWebsitesLink']; ?>

            <?php endif; ?>
            <div class="custom_select_search" <?php if (! $this->_tpl_vars['show_autocompleter']): ?>style="display:none;"<?php endif; ?>>
                <input type="text" length="15" class="websiteSearch inp"/>
                <input type="hidden" class="max_sitename_width" value="130" />
                <input type="submit" value="Search" class="but"/>
				<img title="Clear" class="reset" style="position: relative; top: 4px; left: -44px; cursor: pointer; display: none;" src="plugins/CoreHome/templates/images/reset_search.png"/>
            </div>
        </div>
	</div>
	<?php if (isset ( $this->_tpl_vars['inputName'] )): ?><input type="hidden" name="<?php echo $this->_tpl_vars['inputName']; ?>
" value="<?php if (isset ( $this->_tpl_vars['idSite'] )): ?><?php echo $this->_tpl_vars['idSite']; ?>
<?php else: ?><?php echo $this->_tpl_vars['sites'][0]['idsite']; ?>
<?php endif; ?>"/><?php endif; ?>
</div>
<script type="text/javascript">
	<?php echo '$(document).ready(function() { piwik.initSiteSelectors(); });'; ?>

</script>