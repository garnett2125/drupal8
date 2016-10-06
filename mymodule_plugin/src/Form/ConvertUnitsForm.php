<?php
/**
 * @file
 * Contains \Drupal\mymodule_plugin\Form\ExampleForm.
 **/
namespace Drupal\mymodule_plugin\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ConvertUnitsForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'convert_units_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Return array of Form API elements.
    $form['value'] = array(
      '#type' => 'textfield',
    );
    $form['unit'] = array(
      '#type' => 'select',
      '#options' => array(
        'ft' => 'ft',
        'm' => 'm'
      ),
      '#title' => $this->t('Unit'),
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Convert'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Load the manager service.
    $unit_manager = \Drupal::service('plugin.manager.unit');

      dpm($unit_manager);
//    // Create a class instance through the manager.
//    $feet_instance = $unit_manager->createInstance('unit');
//
//    // Convert 12ft into meters.
//    $converted_value = $feet_instance->toBase($form_state->getValue('value'));

//    dpm($converted_value);
  }
}