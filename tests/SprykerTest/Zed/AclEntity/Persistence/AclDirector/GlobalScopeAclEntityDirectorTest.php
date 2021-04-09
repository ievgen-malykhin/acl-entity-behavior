<?php

namespace SprykerTest\Zed\AclEntity\Persistence\AclDirector;

use Codeception\Test\Unit;
use Spryker\Shared\AclEntity\AclEntityConstants;
use Spryker\Zed\AclEntity\AclEntityConfig;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Zed
 * @group AclEntityBehavior
 * @group Persistence
 * @group GlobalScopeAclEntityDirectorTest
 * Add your own group annotations below this line
 */
class GlobalScopeAclEntityDirectorTest extends Unit
{
    protected function setUp(): void
    {
        $this->deleteTestData();

        parent::setUp();
    }


    public function testUserCanCreate(): void
    {
        // Arrange



        // Act

        // Assert
    }

    public function testUserCanRead(): void
    {

    }

    public function testUserCanUpdate(): void
    {

    }

    public function testUserCanDelete(): void
    {

    }

    /**
     * @return void
     */
    public function testConfigDefaultGlobalOperationMask(): void
    {
        // Arrange
        $config = new AclEntityConfig();

        // Act
        $defaultGlobalOperationMask = $config->getDefaultGlobalOperationMask();

        // Assert
        $this->assertEquals(
            AclEntityConstants::OPERATION_MASK_CREATE
                & AclEntityConstants::OPERATION_MASK_READ
                & AclEntityConstants::OPERATION_MASK_UPDATE
                & AclEntityConstants::OPERATION_MASK_DELETE,
            $defaultGlobalOperationMask
        );
    }

    protected function deleteTestData(): void
    {
        $this->deleteUsers();
        $this->deleteRoles();
        $this->deleteGroups();
        $this->deleteAclRules();
    }

    /**
     * @return void
     */
    protected function deleteUsers(): void
    {

    }

    /**
     * @return void
     */
    protected function deleteRoles(): void
    {

    }

    /**
     * @return void
     */
    protected function deleteGroups(): void
    {

    }

    /**
     * @return void
     */
    protected function deleteAclRules(): void
    {

    }
}
