<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SessionClick Entity
 *
 * @property int $id
 * @property int $session_id
 * @property \Cake\I18n\FrozenTime $add_date
 * @property string $action
 *
 * @property \App\Model\Entity\Session $session
 */
class SessionClick extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
