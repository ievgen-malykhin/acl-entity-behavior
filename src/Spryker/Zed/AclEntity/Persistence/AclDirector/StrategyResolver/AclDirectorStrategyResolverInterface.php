<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Persistence\AclDirector\StrategyResolver;

use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Spryker\Zed\AclEntity\Persistence\AclDirector\AclEntityDirectoryInterface;

interface AclDirectorStrategyResolverInterface
{
    /**
     * @param \Propel\Runtime\ActiveRecord\ActiveRecordInterface $entity
     *
     * @return \Spryker\Zed\AclEntity\Persistence\AclDirector\AclEntityDirectoryInterface
     */
    public function resolve(ActiveRecordInterface $entity): AclEntityDirectoryInterface;
}
