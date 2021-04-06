$modelClass = $this->getModelName();
/** @var \Propel\Runtime\ActiveRecord\ActiveRecordInterface $model */
$model = new $modelClass;
$this->getPersistenceFactory()->createAclDirector($model)->applyAclRule($this);
