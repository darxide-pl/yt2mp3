<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemDownloadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemDownloadsTable Test Case
 */
class ItemDownloadsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemDownloadsTable
     */
    public $ItemDownloads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.item_downloads',
        'app.items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItemDownloads') ? [] : ['className' => 'App\Model\Table\ItemDownloadsTable'];
        $this->ItemDownloads = TableRegistry::get('ItemDownloads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItemDownloads);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
