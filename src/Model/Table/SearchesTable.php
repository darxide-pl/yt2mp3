<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Searches Model
 *
 * @property \Cake\ORM\Association\HasMany $SearchPerforms
 *
 * @method \App\Model\Entity\Search get($primaryKey, $options = [])
 * @method \App\Model\Entity\Search newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Search[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Search|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Search patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Search[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Search findOrCreate($search, callable $callback = null, $options = [])
 */
class SearchesTable extends Table
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

        $this->setTable('searches');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('SearchPerforms', [
            'foreignKey' => 'search_id'
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
            ->requirePresence('query', 'create')
            ->notEmpty('query');

        $validator
            ->dateTime('add_date')
            ->requirePresence('add_date', 'create')
            ->notEmpty('add_date');

        return $validator;
    }
}
