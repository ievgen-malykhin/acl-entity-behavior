<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Business;

use Generated\Shared\Transfer\AclEntityRuleResponseTransfer;
use Generated\Shared\Transfer\AclEntityRuleTransfer;
use Generated\Shared\Transfer\AclEntitySegmentResponseTransfer;
use Generated\Shared\Transfer\AclEntitySegmentTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Spryker\Zed\AclEntity\Business\AclEntityBusinessFactory getFactory()
 * @method \Spryker\Zed\AclEntity\Persistence\AclEntityEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\AclEntity\Persistence\AclEntityRepositoryInterface getRepository()
 */
class AclEntityFacade extends AbstractFacade implements AclEntityFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\AclEntitySegmentTransfer $aclEntitySegmentTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntitySegmentResponseTransfer
     */
    public function createAclEntitySegment(AclEntitySegmentTransfer $aclEntitySegmentTransfer): AclEntitySegmentResponseTransfer
    {
        return $this->getFactory()->createAclEntitySegment()->create($aclEntitySegmentTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\AclEntityRuleTransfer $aclEntityRuleTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntityRuleResponseTransfer
     */
    public function createAclEntityRule(AclEntityRuleTransfer $aclEntityRuleTransfer): AclEntityRuleResponseTransfer
    {
        return $this->getFactory()->createAclEntityRuleWriter()->create($aclEntityRuleTransfer);
    }
}
