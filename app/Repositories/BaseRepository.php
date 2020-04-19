<?php

namespace App\Repositories;
use Illuminate\Container\Container as Application;
abstract class BaseRepository implements RepositoryInterface
{
    protected $app;

    protected $model;


    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
        $this->boot();
    }
    public function boot()
    {

    }

    /**
     * @return Model
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
        }

        return $this->model = $model;
    }

    public function resetModel()
    {
        $this->makeModel();
    }

    abstract public function model();

    public function all($columns = array('*'))
    {
        $data = $this->model->all();
        return $data;
    }
}

