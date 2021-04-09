<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Persistence;

use Orm\Zed\AclEntity\Persistence\SpyAclEntityRuleQuery;
use Orm\Zed\AclEntity\Persistence\SpyAclEntitySegmentQuery;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Spryker\Zed\AclEntity\AclEntityDependencyProvider;
use Spryker\Zed\AclEntity\Dependency\Facade\AclEntityToUserFacadeBridgeInterface;
use Spryker\Zed\AclEntity\Persistence\AclDirector\AclEntityDirectoryInterface;
use Spryker\Zed\AclEntity\Persistence\AclDirector\GlobalScopeAclEntityDirector;
use Spryker\Zed\AclEntity\Persistence\AclDirector\StrategyResolver\AclDirectorStrategyResolver;
use Spryker\Zed\AclEntity\Persistence\AclDirector\StrategyResolver\AclDirectorStrategyResolverInterface;
use Spryker\Zed\AclEntity\Persistence\Mapper\AclEntitySegmentMapper;
use Spryker\Zed\AclEntity\Persistence\Propel\Mapper\AclEntityRuleMapper;
use Spryker\Zed\AclEntity\Persistence\Propel\Mapper\AclEntityRuleMapperInterface;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \Spryker\Zed\AclEntity\AclEntityConfig getConfig()
 * @method \Spryker\Zed\AclEntity\Persistence\AclEntityEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\AclEntity\Persistence\AclEntityRepository getRepository()()
 */
class AclEntityPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @param \Propel\Runtime\ActiveRecord\ActiveRecordInterface $entity
     *
     * @return \Spryker\Zed\AclEntity\Persistence\AclDirector\AclEntityDirectoryInterface
     */
    public function createAclDirector(ActiveRecordInterface $entity): AclEntityDirectoryInterface
    {
        return $this->createAclDirectorStrategyResolver()->resolve($entity);
    }

    /**
     * @return \Spryker\Zed\AclEntity\Persistence\AclDirector\StrategyResolver\AclDirectorStrategyResolverInterface
     */
    public function createAclDirectorStrategyResolver(): AclDirectorStrategyResolverInterface
    {
        $strategyContainer = [];
        $strategyContainer[AclDirectorStrategyResolver::STRATEGY_KEY_GLOBAL] = function () {
            return $this->createGlobalScopeDirector();
        };

        return new AclDirectorStrategyResolver(
            $strategyContainer,
            $this->getRepository(),
            $this->createUserFacade()->getCurrentUser()
        );
    }

    /**
     * @return \Orm\Zed\AclEntity\Persistence\SpyAclEntitySegmentQuery
     */
    public function createAclEntitySegmentQuery(): SpyAclEntitySegmentQuery
    {
        return SpyAclEntitySegmentQuery::create();
    }

    /**
     * @return \Spryker\Zed\AclEntity\Persistence\Mapper\AclEntitySegmentMapper
     */
    public function createAclEntitySegmentMapper(): AclEntitySegmentMapper
    {
        return new AclEntitySegmentMapper();
    }

    /**
     * @return \Orm\Zed\AclEntity\Persistence\SpyAclEntityRuleQuery
     */
    public function createAclEntityRuleQuery(): SpyAclEntityRuleQuery
    {
        return SpyAclEntityRuleQuery::create();
    }

    /**
     * @return \Spryker\Zed\AclEntity\Persistence\Propel\Mapper\AclEntityRuleMapper
     */
    public function createAclEntityRuleMapper(): AclEntityRuleMapper
    {
        return new AclEntityRuleMapper();
    }

    /**
     * @return \Spryker\Zed\AclEntity\Persistence\Propel\Mapper\AclEntityRuleMapper
     */
    public function createPropelAclEntityRuleMapper(): AclEntityRuleMapper
    {
        return new AclEntityRuleMapper();
    }

    /**
     * @return \Spryker\Zed\AclEntity\Persistence\AclDirector\GlobalScopeAclEntityDirector
     */
    protected function createGlobalScopeDirector(): GlobalScopeAclEntityDirector
    {
        return new GlobalScopeAclEntityDirector($this->getRepository(), $this->createUserFacade()->getCurrentUser());
    }

    /**
     * @return \Spryker\Zed\AclEntity\Dependency\Facade\AclEntityToUserFacadeBridgeInterface
     */
    protected function createUserFacade(): AclEntityToUserFacadeBridgeInterface
    {
        return $this->getProvidedDependency(AclEntityDependencyProvider::FACADE_USER);
    }
}
