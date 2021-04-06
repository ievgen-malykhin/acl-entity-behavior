<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Persistence\AclDirector\StrategyResolver;

use Generated\Shared\Transfer\UserTransfer;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Spryker\Zed\AclEntity\Persistence\AclDirector\AclEntityDirectoryInterface;
use Spryker\Zed\AclEntity\Persistence\AclEntityRepositoryInterface;

class AclDirectorStrategyResolver implements AclDirectorStrategyResolverInterface
{
    public const STRATEGY_KEY_GLOBAL = 'STRATEGY_KEY_GLOBAL';
    public const STRATEGY_KEY_SEGMENT = 'STRATEGY_KEY_SEGMENT';
    public const STRATEGY_KEY_INHERITED = 'STRATEGY_KEY_INHERITED';
    public const STRATEGY_KEY_DEFAULT = 'STRATEGY_KEY_DEFAULT';

    /**
     * @var array|\Closure[]
     */
    protected $strategyContainer;

    /**
     * @var \Spryker\Zed\AclEntity\Persistence\AclEntityRepositoryInterface
     */
    protected $aclEntityRepository;

    /**
     * @var \Generated\Shared\Transfer\UserTransfer
     */
    protected $currentUserTransfer;

    /**
     * @param \Closure[] $strategyContainer
     * @param \Spryker\Zed\AclEntity\Persistence\AclEntityRepositoryInterface $aclEntityRepository
     * @param \Generated\Shared\Transfer\UserTransfer $userTransfer
     */
    public function __construct(array $strategyContainer, AclEntityRepositoryInterface $aclEntityRepository, UserTransfer $userTransfer)
    {
        $this->strategyContainer = $strategyContainer;
        $this->aclEntityRepository = $aclEntityRepository;
        $this->currentUserTransfer = $userTransfer;
    }

    /**
     * @param \Propel\Runtime\ActiveRecord\ActiveRecordInterface $entity
     *
     * @return \Spryker\Zed\AclEntity\Persistence\AclDirector\AclEntityDirectoryInterface
     */
    public function resolve(ActiveRecordInterface $entity): AclEntityDirectoryInterface
    {
        $globalScopeAclEntityRules = $this->aclEntityRepository->getEntityGlobalScopeRule($entity, $this->currentUserTransfer);
        if (!empty($globalScopeAclEntityRules->getAclEntityRules())) {
            return call_user_func($this->strategyContainer[static::STRATEGY_KEY_GLOBAL]);
        }

        return call_user_func($this->strategyContainer[static::STRATEGY_KEY_DEFAULT]);
    }
}
