<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:28
         compiled from CoreHome/templates/donate.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'CoreHome/templates/donate.tpl', 6, false),)), $this); ?>
<div class="piwik-donate-call">
	<div class="piwik-donate-message">
		<?php if (isset ( $this->_tpl_vars['msg'] )): ?>
			<?php echo $this->_tpl_vars['msg']; ?>

		<?php else: ?>
		<p><?php echo ((is_array($_tmp='CoreHome_DonateCall1')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</p>
		<p><strong><em><?php echo ((is_array($_tmp='CoreHome_DonateCall2')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</em></strong></p>
		<p><?php echo ((is_array($_tmp='CoreHome_DonateCall3')) ? $this->_run_mod_handler('translate', true, $_tmp, '<em><strong>', '</strong></em>') : smarty_modifier_translate($_tmp, '<em><strong>', '</strong></em>')); ?>
</p>
		<?php endif; ?>
	</div>
	
	<span id="piwik-worth"><?php echo ((is_array($_tmp='CoreHome_HowMuchIsPiwikWorth')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</span>
	<div class="donate-form-instructions">(<?php echo ((is_array($_tmp='CoreHome_DonateFormInstructions')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
)</div>
	
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
		<input type="hidden" name="cmd" value="_s-xclick"/>
		<input type="hidden" name="hosted_button_id" value="DVKLY73RS7JTE"/>
		<input type="hidden" name="currency_code" value="USD"/>
		<input type="hidden" name="on0" value="Piwik Supporter"/>
		
		<div class="piwik-donate-slider">
			 <div class="slider-range">
			 	<div class="slider-position"></div>
			 </div>
			 <div style="display:inline-block">
				 <div class="slider-donate-amount">$30/<?php echo ((is_array($_tmp='General_YearShort_js')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</div>
			 
				 <img class="slider-smiley-face" width="40" height="40" src="themes/default/images/smileyprog_1.png"/>
			 </div>
			 
			 <input type="hidden" name="os0" value="Option 1"/>
		</div>
		
		<div class="donate-submit">
			<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=RPL23NJURMTFA&bb2_screener_=1357583494+83.233.186.82" target="_blank"><?php echo ((is_array($_tmp='CoreHome_MakeOneTimeDonation')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>
			<input type="image" src="themes/default/images/paypal_subscribe.gif" border="0" name="submit" title="<?php echo ((is_array($_tmp='CoreHome_SubscribeAndBecomePiwikSupporter')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
"/>
		</div>
		
		<!-- to cache images -->
		<img style="display:none" src="themes/default/images/smileyprog_0.png"/>
		<img style="display:none" src="themes/default/images/smileyprog_1.png"/>
		<img style="display:none" src="themes/default/images/smileyprog_2.png"/>
		<img style="display:none" src="themes/default/images/smileyprog_3.png"/>
		<img style="display:none" src="themes/default/images/smileyprog_4.png"/>
	</form>
	<?php if (isset ( $this->_tpl_vars['footerMessage'] )): ?>
	<div class="form-description">
		<?php echo $this->_tpl_vars['footerMessage']; ?>

	</div>
	<?php endif; ?>
</div>
<?php echo '
<script type="text/javascript">
$(document).ready(function() {
	// Note: this will cause problems if more than one donate form is on the page
	$(\'.piwik-donate-slider\').each(function() {
		$(this).trigger(\'piwik:changePosition\', {position: 1});
	});
});
</script>
'; ?>
