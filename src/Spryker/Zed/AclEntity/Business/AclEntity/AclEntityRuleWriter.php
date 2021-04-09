<?php

namespace Spryker\Zed\AclEntity\Business\AclEntity;

use Generated\Shared\Transfer\AclEntityRuleResponseTransfer;
use Generated\Shared\Transfer\AclEntityRuleTransfer;
use Spryker\Zed\AclEntity\Business\AclEntity\AclEntityRuleWriterInterface;
use Spryker\Zed\AclEntity\Persistence\AclEntityEntityManagerInterface;

class AclEntityRuleWriter implements AclEntityRuleWriterInterface
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
     * @param \Generated\Shared\Transfer\AclEntityRuleTransfer $aclEntitySegmentTransfer
     *
     * @return \Generated\Shared\Transfer\AclEntityRuleResponseTransfer
     */
    public function create(AclEntityRuleTransfer $aclEntitySegmentTransfer): AclEntityRuleResponseTransfer
    {
        // TODO: Implement create() method.
    }
}
