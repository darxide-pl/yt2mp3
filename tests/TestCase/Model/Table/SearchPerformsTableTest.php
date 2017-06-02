<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SearchPerformsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SearchPerformsTable Test Case
 */
class SearchPerformsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SearchPerformsTable
     */
    public $SearchPerforms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.search_performs',
        'app.searches'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SearchPerforms') ? [] : ['className' => 'App\Model\Table\SearchPerformsTable'];
        $this->SearchPerforms = TableRegistry::get('SearchPerforms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SearchPerforms);

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
