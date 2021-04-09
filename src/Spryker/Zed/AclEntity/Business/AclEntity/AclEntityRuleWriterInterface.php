<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Business\AclEntity;

use Generated\Shared\Transfer\AclEntityRuleResponseTransfer;
use Generated\Shared\Transfer\AclEntityRuleTransfer;

interface AclEntityRuleWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\AclEntityRuleTransfer $aclEntitySegmentTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntityRuleResponseTransfer
     */
    public function create(AclEntityRuleTransfer $aclEntitySegmentTransfer): AclEntityRuleResponseTransfer;
}
