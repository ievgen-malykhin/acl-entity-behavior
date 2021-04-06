<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Business\AclEntity;

use Generated\Shared\Transfer\AclEntitySegmentResponseTransfer;
use Generated\Shared\Transfer\AclEntitySegmentTransfer;
use Spryker\Zed\AclEntity\Persistence\AclEntityEntityManagerInterface;

class AclEntitySegment implements AclEntitySegmentInterface
{
    /**
     * @var \Spryker\Zed\AclEntity\Persistence\AclEntityEntityManagerInterface
     */
    protected $entityManager;

    /**
     * @param \Spryker\Zed\AclEntity\Persistence\AclEntityEntityManagerInterface $entityManager
     */
    public function __construct(AclEntityEntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param \Generated\Shared\Transfer\AclEntitySegmentTransfer $aclEntitySegmentTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntitySegmentResponseTransfer
     */
    public function create(AclEntitySegmentTransfer $aclEntitySegmentTransfer): AclEntitySegmentResponseTransfer
    {
        $aclEntitySegmentTransfer = $this->entityManager->saveAclEntitySegment($aclEntitySegmentTransfer);
        $segmentResponseTransfer = (new AclEntitySegmentResponseTransfer())
            ->setAclEntitySegment($aclEntitySegmentTransfer)
            ->setIsSuccess(true);

        return $segmentResponseTransfer;
    }
}
