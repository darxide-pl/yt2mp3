<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SessionViews Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sessions
 *
 * @method \App\Model\Entity\SessionView get($primaryKey, $options = [])
 * @method \App\Model\Entity\SessionView newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SessionView[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SessionView|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SessionView patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SessionView[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SessionView findOrCreate($search, callable $callback = null, $options = [])
 */
class SessionViewsTable extends Table
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

        $this->setTable('session_views');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
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

        $validator
            ->requirePresence('page', 'create')
            ->notEmpty('page');

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
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));

        return $rules;
    }
}
