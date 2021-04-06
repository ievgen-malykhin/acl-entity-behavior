<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AclEntity\Persistence\Propel\Behavior;

use Propel\Generator\Model\Behavior;

class AclEntityBehavior extends Behavior
{
    /**
     * @return string
     */
    public function objectMethods(): string
    {
        $script = '';
        $script .= $this->addGetPersistenceFactoryMethod();

        return $script;
    }

    /**
     * @return string
     */
    public function queryMethods(): string
    {
        $script = '';
        $script .= $this->addGetPersistenceFactoryMethod();

        return $script;
    }

    /**
     * @return string
     */
    public function preUpdate(): string
    {
        return '$this->getPersistenceFactory()->createAclDirector($this)->inspectUpdate($this);';
    }

    /**
     * @return string
     */
    public function preInsert(): string
    {
        return '$this->getPersistenceFactory()->createAclDirector($this)->inspectCreate($this);';
    }

    /**
     * @return string
     */
    public function preDelete(): string
    {
        return '$this->getPersistenceFactory()->createAclDirector($this)->inspectDelete($this);';
    }

    /**
     * @return string
     */
    public function preSelectQuery(): string
    {
        return $this->renderTemplate('queryPreSelectQuery');
    }

    /**
     * @return string
     */
    protected function addGetPersistenceFactoryMethod(): string
    {
        return $this->renderTemplate('objectGetAclPersistenceFactory');
    }
}
