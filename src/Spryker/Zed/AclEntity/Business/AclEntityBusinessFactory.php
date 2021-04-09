<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Business;

use Spryker\Zed\AclEntity\Business\AclEntity\AclEntitySegment;
use Spryker\Zed\AclEntity\Business\AclEntity\AclEntitySegmentInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\AclEntity\Business\AclEntity\AclEntityRuleWriter;

/**
 * @method \Spryker\Zed\AclEntity\AclEntityConfig getConfig()
 * @method \Spryker\Zed\AclEntity\Persistence\AclEntityEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\AclEntity\Persistence\AclEntityRepositoryInterface getRepository()
 */
class AclEntityBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Spryker\Zed\AclEntity\Business\AclEntity\AclEntitySegmentInterface
     */
    public function createAclEntitySegment(): AclEntitySegmentInterface
    {
        return new AclEntitySegment(
            $this->getEntityManager()
        );
    }

    /**
     * @return \Spryker\Zed\AclEntity\Business\AclEntity\AclEntityRuleWriter
     */
    public function createAclEntityRuleWriter(): AclEntityRuleWriter
    {
        return new AclEntityRuleWriter(
            $this->getEntityManager()
        );
    }
}
