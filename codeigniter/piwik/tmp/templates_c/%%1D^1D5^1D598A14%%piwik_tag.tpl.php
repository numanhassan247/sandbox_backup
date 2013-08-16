<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:14
         compiled from CoreHome/templates/piwik_tag.tpl */ ?>

<?php if ($this->_tpl_vars['piwikUrl'] == 'http://demo.piwik.org/' || $this->_tpl_vars['debugTrackVisitsInsidePiwikUI']): ?>

<div class="clear"></div>
<?php echo '
<!-- Piwik -->
<script type="text/javascript"> 
  var _paq = _paq || [];
  _paq.push([\'setTrackerUrl\', \'piwik.php\']);
  _paq.push([\'setSiteId\', '; ?>
<?php echo $this->_tpl_vars['idSite']; ?>
<?php echo ']);
'; ?>
<?php if ($this->_tpl_vars['piwikUrl'] == 'http://demo.piwik.org/'): ?><?php echo '
  _paq.push([\'setCookieDomain\', \'*.piwik.org\']);
'; ?>
<?php endif; ?><?php echo '
  // set the domain the visitor landed on, in the Custom Variable
  _paq.push([function () {
    if (!this.getCustomVariable(1))
    {
      this.setCustomVariable(1, "Domain landed", document.domain);
    }
  }]);
  // Set the selected Piwik language in a custom var
  _paq.push([\'setCustomVariable\', 2, "Demo language", piwik.languageName]);
  _paq.push([\'setDocumentTitle\', document.domain + "/" + document.title]);
  _paq.push([\'trackPageView\']);
  _paq.push([\'enableLinkTracking\']);

  (function() {
    var d=document, g=d.createElement(\'script\'), s=d.getElementsByTagName(\'script\')[0]; g.type=\'text/javascript\';
    g.defer=true; g.async=true; g.src=\'js/piwik.js\'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Piwik Code -->
'; ?>


<?php endif; ?>