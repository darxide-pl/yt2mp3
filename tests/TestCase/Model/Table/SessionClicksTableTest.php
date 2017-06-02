<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SessionClicksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SessionClicksTable Test Case
 */
class SessionClicksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SessionClicksTable
     */
    public $SessionClicks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.session_clicks',
        'app.sessions',
        'app.session_views'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SessionClicks') ? [] : ['className' => 'App\Model\Table\SessionClicksTable'];
        $this->SessionClicks = TableRegistry::get('SessionClicks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SessionClicks);

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
