<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdukTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdukTable Test Case
 */
class ProdukTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdukTable
     */
    protected $Produk;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Produk',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Produk') ? [] : ['className' => ProdukTable::class];
        $this->Produk = $this->getTableLocator()->get('Produk', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Produk);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ProdukTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
