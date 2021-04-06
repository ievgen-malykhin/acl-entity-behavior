<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Persistence\Mapper;

use Generated\Shared\Transfer\AclEntitySegmentTransfer;
use Orm\Zed\AclEntity\Persistence\SpyAclEntitySegment;

class AclEntitySegmentMapper implements AclEntitySegmentMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\AclEntitySegmentTransfer $aclEntitySegmentTransfer
     * @param \Orm\Zed\AclEntity\Persistence\SpyAclEntitySegment $spyAclEntitySegment
     *
     * @return \Orm\Zed\AclEntity\Persistence\SpyAclEntitySegment
     */
    public function mapAclEntitySegmentTransferToEntity(
        AclEntitySegmentTransfer $aclEntitySegmentTransfer,
        SpyAclEntitySegment $spyAclEntitySegment
    ): SpyAclEntitySegment {
        $spyAclEntitySegment->fromArray($aclEntitySegmentTransfer->toArray(false));

        return $spyAclEntitySegment;
    }
}
