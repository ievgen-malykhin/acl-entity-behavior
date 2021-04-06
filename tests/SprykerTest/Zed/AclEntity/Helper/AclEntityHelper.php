<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\AclEntity\Helper;

use Codeception\Module;
use Generated\Shared\DataBuilder\AclEntitySegmentBuilder;
use Generated\Shared\Transfer\AclEntitySegmentResponseTransfer;
use SprykerTest\Shared\Testify\Helper\LocatorHelperTrait;

class AclEntityHelper extends Module
{
    use LocatorHelperTrait;

    /**
     * @param array $seedData
     *
     * @return \Generated\Shared\Transfer\AclEntitySegmentResponseTransfer
     */
    public function haveAclEntitySegment(array $seedData = []): AclEntitySegmentResponseTransfer
    {
        $segmentTransfer = (new AclEntitySegmentBuilder($seedData))->build();

        $segmentResponseTransfer = $this->getLocator()
            ->aclEntity()
            ->facade()
            ->createAclEntitySegment($segmentTransfer);

        return $segmentResponseTransfer;
    }
}
