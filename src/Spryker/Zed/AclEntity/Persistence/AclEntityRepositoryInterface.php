<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Persistence;

use Generated\Shared\Transfer\AclEntityRuleCollectionTransfer;
use Generated\Shared\Transfer\UserTransfer;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;

interface AclEntityRepositoryInterface
{
    /**
     * @param \Propel\Runtime\ActiveRecord\ActiveRecordInterface $entity
     * @param \Generated\Shared\Transfer\UserTransfer $userTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntityRuleCollectionTransfer
     */
    public function getEntityGlobalScopeRule(ActiveRecordInterface $entity, UserTransfer $userTransfer): AclEntityRuleCollectionTransfer;

    /**
     * @param \Propel\Runtime\ActiveRecord\ActiveRecordInterface $entity
     * @param \Generated\Shared\Transfer\UserTransfer $userTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntityRuleCollectionTransfer
     */
    public function getEntitySegmentScopeRule(ActiveRecordInterface $entity, UserTransfer $userTransfer): AclEntityRuleCollectionTransfer;

    /**
     * @param \Propel\Runtime\ActiveRecord\ActiveRecordInterface $entity
     * @param \Generated\Shared\Transfer\UserTransfer $userTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntityRuleCollectionTransfer
     */
    public function getEntityInheritedScopeRule(ActiveRecordInterface $entity, UserTransfer $userTransfer): AclEntityRuleCollectionTransfer;
}
