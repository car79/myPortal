<?php

namespace Drupal\lavoro\Plugin\Field\FieldType;

use Drupal\link\Plugin\Field\FieldType\LinkItem;

/**
 * Variant of the 'link' field that links to the current company.
 *
 * @FieldType(
 *   id = "current_company_link",
 *   label = @Translation("Current company"),
 *   description = @Translation("A link to the current company that is associated with the entity."),
 *   default_widget = "link_default",
 *   default_formatter = "link",
 *   constraints = {"LinkType" = {}, "LinkAccess" = {}, "LinkExternalProtocols" = {}, "LinkNotExistingInternal" = {}}
 * )
 */
class OreLavorativeDefinitiveItem extends LinkItem {

  /**
   * Whether or not the value has been calculated.
   *
   * @var bool
   */
  protected $isCalculated = FALSE;

  /**
   * {@inheritdoc}
   */
  public function __get($name) {
    $this->ensureCalculated();
    return parent::__get($name);
  }
  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $this->ensureCalculated();
    return parent::isEmpty();
  }

  /**
   * {@inheritdoc}
   */
  public function getValue() {
    $this->ensureCalculated();
    return parent::getValue();
  }

  /**
   * Calculates the value of the field and sets it.
   */
  protected function ensureCalculated() {
    if (!$this->isCalculated) {
      $entity = $this->getEntity();
      if (!$entity->isNew()) {
        // Some custom code that retrieves the current company.
        $company = mymodule_get_company($this->getEntity());
        $value = [
          'uri' => $company->toUrl()->toUriString(),
          'title' => t('Current company'),
        ];
        $this->setValue($value);
      }
      $this->isCalculated = TRUE;
    }
  }

}