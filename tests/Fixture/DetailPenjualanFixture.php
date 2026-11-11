<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetailPenjualanFixture
 */
class DetailPenjualanFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'detail_penjualan';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_detail' => 1,
                'id_penjualan' => 1,
                'id_produk' => 1,
                'nama_produk' => 'Lorem ipsum dolor sit amet',
                'jumlah_produk' => 1,
                'subtotal' => 1.5,
            ],
        ];
        parent::init();
    }
}
