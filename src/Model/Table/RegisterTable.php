<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Register Model
 *
 * @method \App\Model\Entity\Register newEmptyEntity()
 * @method \App\Model\Entity\Register newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Register> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Register get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Register findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Register patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Register> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Register|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Register saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Register>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Register>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Register>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Register> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Register>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Register>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Register>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Register> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RegisterTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('register');
        $this->setDisplayField('nama');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nama')
            ->maxLength('nama', 100)
            ->requirePresence('nama', 'create')
            ->notEmptyString('nama');

        $validator
            ->scalar('username')
            ->maxLength('username', 100)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 100)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('role')
            ->requirePresence('role', 'create')
            ->notEmptyString('role');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);

        return $rules;
    }
}
