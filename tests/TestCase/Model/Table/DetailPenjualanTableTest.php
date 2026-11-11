<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetailPenjualanTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetailPenjualanTable Test Case
 */
class DetailPenjualanTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DetailPenjualanTable
     */
    protected $DetailPenjualan;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.DetailPenjualan',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DetailPenjualan') ? [] : ['className' => DetailPenjualanTable::class];
        $this->DetailPenjualan = $this->getTableLocator()->get('DetailPenjualan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DetailPenjualan);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\DetailPenjualanTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
