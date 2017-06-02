<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SessionViewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SessionViewsTable Test Case
 */
class SessionViewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SessionViewsTable
     */
    public $SessionViews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.session_views',
        'app.sessions',
        'app.session_clicks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SessionViews') ? [] : ['className' => 'App\Model\Table\SessionViewsTable'];
        $this->SessionViews = TableRegistry::get('SessionViews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SessionViews);

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
