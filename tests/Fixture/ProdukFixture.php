<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProdukFixture
 */
class ProdukFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'produk';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_produk' => 1,
                'nama_produk' => 'Lorem ipsum dolor sit amet',
                'harga' => 1.5,
                'stok' => 1,
            ],
        ];
        parent::init();
    }
}
