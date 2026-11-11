<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetailPenjualan Model
 *
 * @method \App\Model\Entity\DetailPenjualan newEmptyEntity()
 * @method \App\Model\Entity\DetailPenjualan newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DetailPenjualan> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetailPenjualan get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DetailPenjualan findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DetailPenjualan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DetailPenjualan> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetailPenjualan|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DetailPenjualan saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DetailPenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetailPenjualan>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetailPenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetailPenjualan> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetailPenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetailPenjualan>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetailPenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetailPenjualan> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DetailPenjualanTable extends Table
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

        $this->setTable('detail_penjualan');
        $this->setDisplayField('nama_produk');
        $this->setPrimaryKey('id_detail');
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
            ->integer('id_penjualan')
            ->requirePresence('id_penjualan', 'create')
            ->notEmptyString('id_penjualan');

        $validator
            ->integer('id_produk')
            ->requirePresence('id_produk', 'create')
            ->notEmptyString('id_produk');

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
            ->decimal('subtotal')
            ->requirePresence('subtotal', 'create')
            ->notEmptyString('subtotal');

        return $validator;
    }
}
