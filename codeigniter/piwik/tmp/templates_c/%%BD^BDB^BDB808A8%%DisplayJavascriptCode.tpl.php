<?php /* Smarty version 2.6.26, created on 2013-04-24 12:50:04
         compiled from SitesManager/templates/DisplayJavascriptCode.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'SitesManager/templates/DisplayJavascriptCode.tpl', 20, false),)), $this); ?>

<?php echo '
<style type="text/css">
.trackingHelp ul { 
	padding-left:40px;
	list-style-type:square;
}
.trackingHelp ul li {
	margin-bottom:10px;
}
.trackingHelp h2 {
	margin-top:20px;
}
p {
	text-align:justify;
}
</style>
'; ?>


<h2><?php echo ((is_array($_tmp='SitesManager_TrackingTags')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['displaySiteName']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['displaySiteName'])); ?>
</h2>

<div class='trackingHelp'>
<?php echo ((is_array($_tmp='Installation_JSTracking_Intro')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

<br/><br/>
<?php echo ((is_array($_tmp='CoreAdminHome_JSTrackingIntro3')) ? $this->_run_mod_handler('translate', true, $_tmp, '<a href="http://piwik.org/integrate/" target="_blank">', '</a>') : smarty_modifier_translate($_tmp, '<a href="http://piwik.org/integrate/" target="_blank">', '</a>')); ?>


<h3><?php echo ((is_array($_tmp='SitesManager_JsTrackingTag')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
<p><?php echo ((is_array($_tmp='CoreAdminHome_JSTracking_CodeNote')) ? $this->_run_mod_handler('translate', true, $_tmp, "&lt;/body&gt;") : smarty_modifier_translate($_tmp, "&lt;/body&gt;")); ?>
</p>

<pre class="code-pre"><code><?php echo $this->_tpl_vars['jsTag']; ?>
</code></pre>

<br />
<?php echo ((is_array($_tmp='CoreAdminHome_JSTrackingIntro5')) ? $this->_run_mod_handler('translate', true, $_tmp, '<a target="_blank" href="http://piwik.org/docs/javascript-tracking/">', '</a>') : smarty_modifier_translate($_tmp, '<a target="_blank" href="http://piwik.org/docs/javascript-tracking/">', '</a>')); ?>

<br/><br/>
<?php echo ((is_array($_tmp='Installation_JSTracking_EndNote')) ? $this->_run_mod_handler('translate', true, $_tmp, '<em>', '</em>') : smarty_modifier_translate($_tmp, '<em>', '</em>')); ?>


</div>
<?php echo '
<script type="text/javascript">
$(document).ready(function () {
	// when code element is clicked, select the text
	$(\'code\').click(function () {
		// credit where credit is due:
		//   http://stackoverflow.com/questions/1173194/select-all-div-text-with-single-mouse-click
		var range;
		if (document.body.createTextRange) // MSIE
		{
			range = document.body.createTextRange();
			range.moveToElementText(this);
			range.select();
		}
		else if (window.getSelection) // others
		{
			range = document.createRange();
			range.selectNodeContents(this);
			
			var selection = window.getSelection();
			selection.removeAllRanges();
			selection.addRange(range);
		}
	});
	
	$(\'code\').click();
});
</script>
'; ?>
