<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Persistence\AclDirector;

use Generated\Shared\Transfer\UserTransfer;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Spryker\Shared\AclEntity\AclEntityConstants;
use Spryker\Zed\AclEntity\Persistence\AclEntityRepositoryInterface;
use Spryker\Zed\AclEntity\Persistence\Exception\AclEntityException;

class GlobalScopeAclEntityDirector implements AclEntityDirectoryInterface
{
    /**
     * @var \Spryker\Zed\AclEntity\Persistence\AclEntityRepositoryInterface
     */
    protected $aclEntityRepository;

    /**
     * @var \Generated\Shared\Transfer\UserTransfer
     */
    protected $currentUser;

    /**
     * @param \Spryker\Zed\AclEntity\Persistence\AclEntityRepositoryInterface $aclEntityRepository
     * @param \Generated\Shared\Transfer\UserTransfer $currentUser
     */
    public function __construct(AclEntityRepositoryInterface $aclEntityRepository, UserTransfer $currentUser)
    {
        $this->aclEntityRepository = $aclEntityRepository;
        $this->currentUser = $currentUser;
    }

    /**
     * @param \Propel\Runtime\ActiveRecord\ActiveRecordInterface $entity
     *
     * @throws \Spryker\Zed\AclEntity\Persistence\Exception\AclEntityException
     *
     * @return void
     */
    public function inspectCreate(ActiveRecordInterface $entity): void
    {
        $rules = $this->aclEntityRepository->getEntityGlobalScopeRule($entity, $this->currentUser);
        foreach ($rules->getAclEntityRules() as $rule) {
            if ($rule->getPermissionMask() & AclEntityConstants::OPERATION_MASK_CREATE) {
                return;
            }
        }

        throw new AclEntityException(sprintf('Operation "insert" is restricted for %s', get_class($entity)));
    }

    /**
     * @param \Propel\Runtime\ActiveRecord\ActiveRecordInterface $entity
     *
     * @throws \Spryker\Zed\AclEntity\Persistence\Exception\AclEntityException
     *
     * @return void
     */
    public function inspectUpdate(ActiveRecordInterface $entity): void
    {
        $rules = $this->aclEntityRepository->getEntityGlobalScopeRule($entity, $this->currentUser);
        foreach ($rules->getAclEntityRules() as $rule) {
            if ($rule->getPermissionMask() & AclEntityConstants::OPERATION_MASK_UPDATE) {
                return;
            }
        }

        throw new AclEntityException(sprintf('Operation "update" is restricted for %s', get_class($entity)));
    }

    /**
     * @param \Propel\Runtime\ActiveRecord\ActiveRecordInterface $entity
     *
     * @throws \Spryker\Zed\AclEntity\Persistence\Exception\AclEntityException
     *
     * @return void
     */
    public function inspectDelete(ActiveRecordInterface $entity): void
    {
        $rules = $this->aclEntityRepository->getEntityGlobalScopeRule($entity, $this->currentUser);
        foreach ($rules->getAclEntityRules() as $rule) {
            if ($rule->getPermissionMask() & AclEntityConstants::OPERATION_MASK_DELETE) {
                return;
            }
        }

        throw new AclEntityException(sprintf('Operation "delete" is restricted for %s', get_class($entity)));
    }

    /**
     * @param \Propel\Runtime\ActiveQuery\ModelCriteria $query
     *
     * @return \Propel\Runtime\ActiveQuery\ModelCriteria
     */
    public function applyAclRule(ModelCriteria $query): ModelCriteria
    {
        $class = $query->getModelName();
        $rules = $this->aclEntityRepository->getEntityGlobalScopeRule(new $class(), $this->currentUser);
        foreach ($rules->getAclEntityRules() as $rule) {
            if ($rule->getPermissionMask() & AclEntityConstants::OPERATION_MASK_READ) {
                return $query;
            }
        }

        // empty result set in case when "read" is not permitted
        return $query->where('0=1');
    }
}
