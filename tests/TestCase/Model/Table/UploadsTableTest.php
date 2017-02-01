<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UploadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UploadsTable Test Case
 */
class UploadsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UploadsTable
     */
    public $Uploads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.uploads',
        'app.posts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Uploads') ? [] : ['className' => 'App\Model\Table\UploadsTable'];
        $this->Uploads = TableRegistry::get('Uploads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Uploads);

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
