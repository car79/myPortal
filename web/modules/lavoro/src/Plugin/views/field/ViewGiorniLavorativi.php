<?php

namespace Drupal\lavoro\Plugin\views\field;

use Drupal\views\ResultRow;
use Drupal\views\Plugin\views\field\FieldPluginBase;

/**
 * A handler to provide proper displays for profile current company.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("lavoro_view_giorni_lavorativi")
 */
class ViewGiorniLavorativi extends FieldPluginBase
{

    /**
     * {@inheritdoc}
     */
    public function render(ResultRow $values)
    {

        /*  $relationship_entities = $values->_relationship_entities;
        $company = '';
        // First check the referenced entity.
        if (isset($relationship_entities['node'])) {
            $profile = $relationship_entities['node'];
        } else {
            $profile = $values->_entity;
        }

        $type = get_class($profile);
        if ($type === 'Drupal\profile\Entity\Profile') {
            $company = $profile->get('current_company')->getvalue();
        }*/
        return round($values->_entity->get("giorni_lavorativi")->value);
    }

    /**
     * {@inheritdoc}
     */
    public function query()
    {
        // This function exists to override parent query function.
        // Do nothing.
    }
}
