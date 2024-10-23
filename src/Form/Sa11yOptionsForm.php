<?php

namespace Drupal\localgov_sa11y\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Settings form for localgov_sa11y options.
 */
class Sa11yOptionsForm extends ConfigFormBase {

  use StringTranslationTrait;

  const LOCALGOV_SA11Y_SETTINGS = 'localgov_sa11y_options_form';

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'localgov_sa11y_options.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return self::LOCALGOV_SA11Y_SETTINGS;
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('localgov_sa11y_options.settings');

    $default_checkRoot_value = $config->get('checkRoot');
    $form['checkRoot'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Check Root: A single selector to scan a specific region of the page'),
      '#description' => $this->t('A single selector to scan a specific region of the page. This selector should exist on every page of your website. (Default: "div.dialog-off-canvas-main-canvas")'),
      '#default_value' => !empty($default_checkRoot_value) ? $default_checkRoot_value : 'div.dialog-off-canvas-main-canvas',
      '#required' => TRUE,
    ];

    $default_containerIgnore_value = $config->get('containerIgnore');
    $form['containerIgnore'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Container Ignore: Ignore specific regions of the page'),
      '#description' => $this->t('List of CSS selectors to have Sa11y completely ignore specifc regions of the page - add each selector on a separate line (Default: "")'),
      '#default_value' => !empty($default_containerIgnore_value) ? $default_containerIgnore_value : '',
      '#required' => FALSE,
    ];

    $default_contrastIgnore_value = $config->get('contrastIgnore');
    $form['contrastIgnore'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Contrast Ignore: Ignore specific elements from the contrast check'),
      '#description' => $this->t('List of CSS selectors to have sa11y ignore specific elements from the contrast check - add each selector on a separate line (Default: "")'),
      '#default_value' => !empty($default_contrastIgnore_value) ? $default_contrastIgnore_value : '',
      '#required' => FALSE,
    ];

    $default_linkIgnore_value = $config->get('linkIgnore');
    $form['linkIgnore'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Link Ignore: Ignore specific links on the page'),
      '#description' => $this->t('List of CSS selectors to have sa11y ignore specific links on the page - add each selector on a separate line (Default: "")'),
      '#default_value' => !empty($default_linkIgnore_value) ? $default_linkIgnore_value : '',
      '#required' => FALSE,
    ];

    $default_exportResultsPlugin_value = $config->get('exportResultsPlugin');
    $form['exportResultsPlugin'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Allow "Export Reports"?'),
      '#description' => $this->t('Select if you would like to add buttons that allow users to export issues as CSV or HTML (Default: FALSE)'),
      '#default_value' => !empty($default_exportResultsPlugin_value) ? $default_exportResultsPlugin_value : FALSE,
      '#required' => FALSE,
    ];

    $default_checkAllHideToggles_value = $config->get('checkAllHideToggles');
    $form['checkAllHideToggles'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Visually hide all toggle switches?'),
      '#description' => $this->t('Select if you would like to visually hide all toggle switches in the Settings panel. This will not hide the Readability, Dark Mode, or Colour Filter toggles (Default: FALSE)'),
      '#default_value' => !empty($default_checkAllHideToggles_value) ? $default_checkAllHideToggles_value : FALSE,
      '#required' => FALSE,
    ];

    $default_panelPosition_value = $config->get('panelPosition');
    $form['panelPosition'] = [
      '#type' => 'select',
      '#options' => [
        'right' => $this->t('right'),
        'left' => $this->t('left'),
        'top-right' => $this->t('top-right'),
        'top-left' => $this->t('top-left'),
      ],
      '#title' => $this->t('Panel position'),
      '#description' => $this->t('Move position of panel in any four corners. Choose from top-left, top-right, left, and right (Default: "right")'),
      '#default_value' => !empty($default_panelPosition_value) ? $default_panelPosition_value : 'right',
      '#required' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('localgov_sa11y_options.settings')
      ->set('checkRoot', $form_state->getValue('checkRoot'))
      ->set('containerIgnore', $form_state->getValue('containerIgnore'))
      ->set('contrastIgnore', $form_state->getValue('contrastIgnore'))
      ->set('linkIgnore', $form_state->getValue('linkIgnore'))
      ->set('exportResultsPlugin', $form_state->getValue('exportResultsPlugin'))
      ->set('checkAllHideToggles', $form_state->getValue('checkAllHideToggles'))
      ->set('panelPosition', $form_state->getValue('panelPosition'))
      ->save();
  }

}
