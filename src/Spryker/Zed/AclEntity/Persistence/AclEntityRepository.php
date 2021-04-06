<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Persistence;

use Generated\Shared\Transfer\AclEntityRuleCollectionTransfer;
use Generated\Shared\Transfer\UserTransfer;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Spryker\Shared\AclEntity\AclEntityConstants;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \Spryker\Zed\AclEntity\Persistence\AclEntityPersistenceFactory getFactory()
 */
class AclEntityRepository extends AbstractRepository implements AclEntityRepositoryInterface
{
    /**
     * @param \Propel\Runtime\ActiveRecord\ActiveRecordInterface $entity
     * @param \Generated\Shared\Transfer\UserTransfer $userTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntityRuleCollectionTransfer
     */
    public function getEntityGlobalScopeRule(ActiveRecordInterface $entity, UserTransfer $userTransfer): AclEntityRuleCollectionTransfer
    {
        return $this->getEntityRulesByEntityScopeAndUser($entity, $userTransfer, AclEntityConstants::SCOPE_GLOBAL);
    }

    /**
     * @param \Propel\Runtime\ActiveRecord\ActiveRecordInterface $entity
     * @param \Generated\Shared\Transfer\UserTransfer $userTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntityRuleCollectionTransfer
     */
    public function getEntitySegmentScopeRule(ActiveRecordInterface $entity, UserTransfer $userTransfer): AclEntityRuleCollectionTransfer
    {
        return $this->getEntityRulesByEntityScopeAndUser($entity, $userTransfer, AclEntityConstants::SCOPE_SEGMENT);
    }

    /**
     * @param \Propel\Runtime\ActiveRecord\ActiveRecordInterface $entity
     * @param \Generated\Shared\Transfer\UserTransfer $userTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntityRuleCollectionTransfer
     */
    public function getEntityInheritedScopeRule(ActiveRecordInterface $entity, UserTransfer $userTransfer): AclEntityRuleCollectionTransfer
    {
        return $this->getEntityRulesByEntityScopeAndUser($entity, $userTransfer, AclEntityConstants::SCOPE_INHERITED);
    }

    /**
     * @param \Propel\Runtime\ActiveRecord\ActiveRecordInterface $entity
     * @param \Generated\Shared\Transfer\UserTransfer $userTransfer
     * @param string $scope
     *
     * @return \Generated\Shared\Transfer\AclEntityRuleCollectionTransfer
     */
    protected function getEntityRulesByEntityScopeAndUser(
        ActiveRecordInterface $entity,
        UserTransfer $userTransfer,
        string $scope
    ): AclEntityRuleCollectionTransfer {
        $aclEntityRuleEntityCollection = $this->getFactory()
            ->createAclEntityRuleQuery()
            ->filterByEntity(get_class($entity))
            ->filterByScope(AclEntityConstants::SCOPE_GLOBAL)
            ->useSpyAclRoleQuery()
            ->useSpyAclGroupsHasRolesQuery()
            ->useSpyAclGroupQuery()
            ->useSpyAclUserHasGroupQuery()
            ->filterByFkUser($userTransfer->getIdUser())
            ->endUse()
            ->endUse()
            ->endUse()
            ->endUse()
            ->find();

        return $this->getFactory()
            ->createPropelAclEntityRuleMapper()
            ->mapAclEntityRuleCollectionToAclEntityRuleCollectionTransfer(
                $aclEntityRuleEntityCollection,
                new AclEntityRuleCollectionTransfer()
            );
    }
}
