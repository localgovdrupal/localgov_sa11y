(function sa11yScript(Drupal, drupalSettings) {
  Drupal.behaviors.sa11y = {
    attach: function (context, settings) {

      const checkRootSetting = (drupalSettings.localgov_sa11y.checkRoot) ? drupalSettings.localgov_sa11y.checkRoot : 'div.dialog-off-canvas-main-canvas';
      const containerIgnoreSetting = (drupalSettings.localgov_sa11y.containerIgnore) ? drupalSettings.localgov_sa11y.containerIgnore.replace(/\n/g, ",") : '';
      const contrastIgnoreSetting = (drupalSettings.localgov_sa11y.contrastIgnore) ? drupalSettings.localgov_sa11y.contrastIgnore.replace(/\n/g, ",") : '';
      const linkIgnoreSetting = (drupalSettings.localgov_sa11y.linkIgnore) ? drupalSettings.localgov_sa11y.linkIgnore.replace(/\n/g, ",") : '';
      const exportResultsPluginSetting = (drupalSettings.localgov_sa11y.exportResultsPlugin) ? drupalSettings.localgov_sa11y.exportResultsPlugin : 0;
      const checkAllHideTogglesSetting = (drupalSettings.localgov_sa11y.checkAllHideToggles) ? drupalSettings.localgov_sa11y.checkAllHideToggles : 0;
      const panelPositionSetting = (drupalSettings.localgov_sa11y.panelPosition) ? drupalSettings.localgov_sa11y.panelPosition : 'right';

      context = context || document;
      Sa11y.Lang.addI18n(Sa11yLangEn.strings);
      const sa11y = new Sa11y.Sa11y({
        checkRoot: checkRootSetting,
        containerIgnore: containerIgnoreSetting,
        contrastIgnore: contrastIgnoreSetting,
        linkIgnore: linkIgnoreSetting,
        exportResultsPlugin: exportResultsPluginSetting,
        checkAllHideToggles: checkAllHideTogglesSetting,
        panelPosition: panelPositionSetting,
      });
    },
  };
})(Drupal, drupalSettings);
