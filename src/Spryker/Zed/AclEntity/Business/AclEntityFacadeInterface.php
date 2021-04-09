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

interface AclEntityFacadeInterface
{
    /**
     * Specification:
     * - Creates an acl entity segment
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\AclEntitySegmentTransfer $aclEntitySegmentTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntitySegmentResponseTransfer
     */
    public function createAclEntitySegment(AclEntitySegmentTransfer $aclEntitySegmentTransfer): AclEntitySegmentResponseTransfer;

    /**
     * Specification:
     * - Creates an acl entity rule
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\AclEntityRuleTransfer $aclEntityRuleTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntityRuleResponseTransfer
     */
    public function createAclEntityRule(AclEntityRuleTransfer $aclEntityRuleTransfer): AclEntityRuleResponseTransfer;
}
