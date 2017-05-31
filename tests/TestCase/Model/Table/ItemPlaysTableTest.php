<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemPlaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemPlaysTable Test Case
 */
class ItemPlaysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemPlaysTable
     */
    public $ItemPlays;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.item_plays',
        'app.items',
        'app.item_downloads'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItemPlays') ? [] : ['className' => 'App\Model\Table\ItemPlaysTable'];
        $this->ItemPlays = TableRegistry::get('ItemPlays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItemPlays);

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
