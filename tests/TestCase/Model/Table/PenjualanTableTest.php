<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PenjualanTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PenjualanTable Test Case
 */
class PenjualanTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PenjualanTable
     */
    protected $Penjualan;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Penjualan',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Penjualan') ? [] : ['className' => PenjualanTable::class];
        $this->Penjualan = $this->getTableLocator()->get('Penjualan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Penjualan);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\PenjualanTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
