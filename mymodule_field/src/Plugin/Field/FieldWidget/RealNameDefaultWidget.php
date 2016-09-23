<?php
/**
 * @file
 * Contains \Drupal\mymodule_field\Plugin\Field\FieldWidget\RealNameDefaultWidget
 */
namespace Drupal\mymodule_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'realname_default' widget.
 *
 * @FieldWidget(
 *   id = "realname_default",
 *   label = @Translation("Real name"),
 *   field_types = {
 *     "realname"
 *   }
 * )
 */
class RealNameDefaultWidget extends WidgetBase {
  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['first_name'] = array(
      '#type' => 'textfield',
      '#title' => t('First name'),
      '#default_value' => '',
      '#size' => 25,
      '#required' => $element['#required'],
    );
    $element['last_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Last name'),
      '#default_value' => '',
      '#size' => 25,
      '#required' => $element['#required'],
    );
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return array(
      'my_setting' => 60,
    ) + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $element['my_setting'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('My custom setting'),
      '#default_value' => $this->getSetting('my_setting'),
    );
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = array();

    $my_setting = $this->getSetting('my_setting');
    if (!empty($placeholder)) {
      $summary[] = t('My setting: @my_setting', array('@my_setting' => $my_setting));
    }
    else {
      $summary[] = t('No setting');
    }

    return $summary;
  }
}