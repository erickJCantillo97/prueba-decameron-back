<?php
namespace App\Repositories;

abstract class BaseRepository {
    protected $model;

    abstract public function model();

    public function __construct()
    {
        $this->makeModel();
    }

    public function makeModel(){
        $this->model = app()->make($this->model());
    }

    public function getAll(){
        return $this->model->all();
    }

    public function create(Array $data){
        return $this->model->create($data);
    }

    public function find($id){
        return $this->model->find($id);
    }

    public function update($id, Array $data){
        return $this->find($id)->update($data);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }

    public function findBy($field, $value){
        return $this->model->where($field, $value)->first();
    }
}
