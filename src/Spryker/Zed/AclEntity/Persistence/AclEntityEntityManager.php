<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Persistence;

use Generated\Shared\Transfer\AclEntitySegmentTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \Spryker\Zed\AclEntity\Persistence\AclEntityPersistenceFactory getFactory()
 */
class AclEntityEntityManager extends AbstractEntityManager implements AclEntityEntityManagerInterface
{
    /**
     * {@inheritDoc}
     *
     * @param \Generated\Shared\Transfer\AclEntitySegmentTransfer $aclEntitySegmentTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntitySegmentTransfer
     */
    public function saveAclEntitySegment(AclEntitySegmentTransfer $aclEntitySegmentTransfer): AclEntitySegmentTransfer
    {
        $spyAclEntitySegment = $this->getFactory()
            ->createAclEntitySegmentQuery()
            ->filterByIdAclEntitySegment($aclEntitySegmentTransfer->getIdAclEntitySegment())
            ->findOneOrCreate();

        $spyAclEntitySegment = $this->getFactory()
            ->createAclEntitySegmentMapper()
            ->mapAclEntitySegmentTransferToEntity($aclEntitySegmentTransfer, $spyAclEntitySegment);

        $spyAclEntitySegment->save();

        $aclEntitySegmentTransfer->fromArray($spyAclEntitySegment->toArray(), false);

        return $aclEntitySegmentTransfer;
    }
}
