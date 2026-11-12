<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Penjualan Model
 *
 * @method \App\Model\Entity\Penjualan newEmptyEntity()
 * @method \App\Model\Entity\Penjualan newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Penjualan> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Penjualan get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Penjualan findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Penjualan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Penjualan> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Penjualan|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Penjualan saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Penjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Penjualan>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Penjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Penjualan> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Penjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Penjualan>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Penjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Penjualan> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PenjualanTable extends Table
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

        $this->setTable('penjualan');
        $this->setDisplayField('nama_produk');
        $this->setPrimaryKey('id_penjualan');
        $this->belongsTo('Produk', [
        'foreignKey' => 'produk_id',
        'joinType' => 'INNER',
    ]);
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
            ->dateTime('tanggal_penjualan')
            ->requirePresence('tanggal_penjualan', 'create')
            ->notEmptyDateTime('tanggal_penjualan');

        $validator
            ->scalar('nama_produk')
            ->maxLength('nama_produk', 255)
            ->requirePresence('nama_produk', 'create')
            ->notEmptyString('nama_produk');

        $validator
            ->integer('jumlah_produk')
            ->requirePresence('jumlah_produk', 'create')
            ->notEmptyString('jumlah_produk');

        $validator
            ->decimal('total')
            ->requirePresence('total', 'create')
            ->notEmptyString('total');

        $validator
            ->integer('id_pelanggan')
            ->requirePresence('id_pelanggan', 'create')
            ->notEmptyString('id_pelanggan');

        return $validator;
    }
}
