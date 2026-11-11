<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produk Model
 *
 * @method \App\Model\Entity\Produk newEmptyEntity()
 * @method \App\Model\Entity\Produk newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Produk> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produk get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Produk findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Produk patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Produk> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produk|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Produk saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Produk>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Produk>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Produk>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Produk> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Produk>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Produk>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Produk>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Produk> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProdukTable extends Table
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

        $this->setTable('produk');
        $this->setDisplayField('nama_produk');
        $this->setPrimaryKey('id_produk');
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
            ->scalar('nama_produk')
            ->maxLength('nama_produk', 255)
            ->requirePresence('nama_produk', 'create')
            ->notEmptyString('nama_produk');

        $validator
            ->decimal('harga')
            ->requirePresence('harga', 'create')
            ->notEmptyString('harga');

        $validator
            ->integer('stok')
            ->requirePresence('stok', 'create')
            ->notEmptyString('stok');

        return $validator;
    }
}
