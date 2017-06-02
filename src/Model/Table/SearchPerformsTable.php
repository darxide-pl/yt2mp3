<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SearchPerforms Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Searches
 *
 * @method \App\Model\Entity\SearchPerform get($primaryKey, $options = [])
 * @method \App\Model\Entity\SearchPerform newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SearchPerform[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SearchPerform|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SearchPerform patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SearchPerform[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SearchPerform findOrCreate($search, callable $callback = null, $options = [])
 */
class SearchPerformsTable extends Table
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

        $this->setTable('search_performs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Searches', [
            'foreignKey' => 'search_id',
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
        $rules->add($rules->existsIn(['search_id'], 'Searches'));

        return $rules;
    }
}
