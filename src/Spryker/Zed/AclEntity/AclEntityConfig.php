<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity;

use Spryker\Shared\AclEntity\AclEntityConstants;
use Spryker\Zed\Acl\AclConfig as SprykerAclConfig;

class AclEntityConfig extends SprykerAclConfig
{
    /**
     * @api
     *
     * @return int
     */
    public function getDefaultGlobalOperationMask(): int
    {
        return AclEntityConstants::OPERATION_MASK_CREATE
            & AclEntityConstants::OPERATION_MASK_READ
            & AclEntityConstants::OPERATION_MASK_UPDATE
            & AclEntityConstants::OPERATION_MASK_DELETE;
    }

    /**
     * @api
     *
     * @return array
     */
    public function getAclEntityMetadataCollection(): array
    {
        return [];
    }
}
