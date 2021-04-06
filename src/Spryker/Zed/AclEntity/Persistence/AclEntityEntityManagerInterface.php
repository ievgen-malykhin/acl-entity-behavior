<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Persistence;

use Generated\Shared\Transfer\AclEntitySegmentTransfer;

interface AclEntityEntityManagerInterface
{
    /**
     * Specification:
     * - Creates an acl entity
     * - Finds an acl entity segment by AclEntitySegment::idAclEntitySegment in the transfer
     * - Updates fields in acl entity entity
     *
     * @param \Generated\Shared\Transfer\AclEntitySegmentTransfer $aclEntitySegmentTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntitySegmentTransfer
     */
    public function saveAclEntitySegment(AclEntitySegmentTransfer $aclEntitySegmentTransfer): AclEntitySegmentTransfer;
}
