<?php
namespace App\Model\Table;

use App\Model\Entity\Cocktail;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * Cocktails Model
 */
class CocktailsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('cocktails');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this->addBehavior('Search.Search');
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }

    /**
     * FriendsOfCake (index) Search
     *
     * @return \Search\Manager
     */
    public function searchConfiguration()
    {
        $search = new Manager($this);
        $search
            ->like('filter', [
                'before' => true,
                'after' => true,
                'fieldMode' => 'OR',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                //'field' => $this->aliasField('name')
                'field' => [$this->aliasField('name'), $this->aliasField('description')]
            ]);

        return $search;
    }
}
