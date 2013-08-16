<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:24
         compiled from Live/templates/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'Live/templates/index.tpl', 38, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $(\'#visitsLive\').liveWidget({
        interval: '; ?>
<?php echo $this->_tpl_vars['liveRefreshAfterMs']; ?>
<?php echo ',
        onUpdate: function(){
            //updates the numbers of total visits in startbox
            var ajaxRequest = new ajaxHelper();
            ajaxRequest.setFormat(\'html\');
            ajaxRequest.addParams({
                module: \'Live\',
                action: \'ajaxTotalVisitors\'
            }, \'GET\');
            ajaxRequest.setCallback(function (r) {
                $("#visitsTotal").html(r);
            });
            ajaxRequest.send(false);
        },
        maxRows: 10,
        fadeInSpeed: 600,
        dataUrlParams: {
            module: \'Live\',
            action: \'getLastVisitsStart\'
        }
    });
});
</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Live/templates/totalVisits.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo $this->_tpl_vars['visitors']; ?>


<div class="visitsLiveFooter">
	<a title="Pause Live!" href="javascript:void(0);" onclick="onClickPause();"><img id="pauseImage" border="0" src="plugins/Live/templates/images/pause_disabled.gif" /></a>
	<a title="Start Live!" href="javascript:void(0);" onclick="onClickPlay();"><img id="playImage" border="0" src="plugins/Live/templates/images/play.gif" /></a>
	<?php if (! $this->_tpl_vars['disableLink']): ?>
		&nbsp; <a class="rightLink" href="javascript:broadcast.propagateAjax('module=Live&action=getVisitorLog')"><?php echo ((is_array($_tmp='Live_LinkVisitorLog')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>
	<?php endif; ?>
</div>