<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\AclEntityRuleCollectionTransfer;
use Generated\Shared\Transfer\AclEntityRuleTransfer;
use Orm\Zed\AclEntity\Persistence\SpyAclEntityRule;
use Propel\Runtime\Collection\Collection;

interface AclEntityRuleMapperInterface
{
    /**
     * @param \Orm\Zed\AclEntity\Persistence\SpyAclEntityRule $aclEntityRule
     * @param \Generated\Shared\Transfer\AclEntityRuleTransfer $aclEntityRuleTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntityRuleTransfer
     */
    public function mapAclEntityRuleEntityToAclEntityRuleTransfer(
        SpyAclEntityRule $aclEntityRule,
        AclEntityRuleTransfer $aclEntityRuleTransfer
    ): AclEntityRuleTransfer;

    /**
     * @param \Propel\Runtime\Collection\Collection $aclEntityRuleEntities
     * @param \Generated\Shared\Transfer\AclEntityRuleCollectionTransfer $transfer
     *
     * @return \Generated\Shared\Transfer\AclEntityRuleCollectionTransfer
     */
    public function mapAclEntityRuleCollectionToAclEntityRuleCollectionTransfer(
        Collection $aclEntityRuleEntities,
        AclEntityRuleCollectionTransfer $transfer
    ): AclEntityRuleCollectionTransfer;
}
