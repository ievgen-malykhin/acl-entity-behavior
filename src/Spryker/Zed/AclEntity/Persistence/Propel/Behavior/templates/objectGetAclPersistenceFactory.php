// TODO: signature
protected function getPersistenceFactory()
{
    return (new \Spryker\Zed\Kernel\ClassResolver\Persistence\PersistenceFactoryResolver())
        ->resolve(\Spryker\Zed\AclEntity\Persistence\AclEntityPersistenceFactory::class);
}
