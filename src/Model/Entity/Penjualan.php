<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Penjualan Entity
 *
 * @property int $id_penjualan
 * @property \Cake\I18n\DateTime $tanggal_penjualan
 * @property string $nama_produk
 * @property int $jumlah_produk
 * @property string $total
 * @property int $id_pelanggan
 */
class Penjualan extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'tanggal_penjualan' => true,
        'nama_produk' => true,
        'jumlah_produk' => true,
        'total' => true,
        'id_pelanggan' => true,
    ];
}
