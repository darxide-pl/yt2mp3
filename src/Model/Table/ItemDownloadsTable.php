<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemDownloads Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\ItemDownload get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItemDownload newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItemDownload[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItemDownload|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItemDownload patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItemDownload[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItemDownload findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemDownloadsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('item_downloads');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->dateTime('add_date')
            ->requirePresence('add_date', 'create')
            ->notEmpty('add_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['item_id'], 'Items'));

        return $rules;
    }
}
