<?php

namespace app\core;

/**
 * @package app\core
 */
class Controller
{

    public Model $model;

    protected function getQueryFilters($allowedFilters = [])
    {
        $query = Router::getRequestQuery();
        return $this->formatArrayFields($query, $allowedFilters, ' AND ');
    }

    protected function formatArrayFields($array, $allowedFields = [], $separator = ' , ')
    {
        foreach ($array as $key => $value) {
            if (in_array($key, $allowedFields)) {
                $filters[$key] = $value;
            }
        }
        if ($filters == null) {
            return null;
        }

        $str = '';
        foreach ($filters as $key => $item) {
            if (gettype($item) == 'string') {
                $item = "'" . $item . "'";
            }
            $str .= $key . '=' . $item . $separator;
        }
        return rtrim($str, $separator);
    }

    protected function getJSONBody($associative = false)
    {
        $json = file_get_contents('php://input');
        return json_decode($json, $associative);
    }

    public function get()
    {
        return $this->model->get();
    }

    public function post(): string
    {
        $this->model->loadData($this->getJSONBody());

        if ($this->model->validate() && $this->model->save()) {
            return 'Success';
        }

        return 'Error';
    }

    public function patch(): string
    {
        $this->model->loadData($this->getJSONBody());

        if ($this->model->save()) {
            return 'Success';
        }

        return 'Error';
    }

    public function delete(): string
    {
        $this->model->loadData($this->getJSONBody());
        $id = $this->model->id;

        if ($id) {
            if ($this->model->delete($id)) {
                return 'Success';
            }
        }

        return 'Error';
    }
}