<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cocktail Entity.
 */
class Cocktail extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
    ];
}
