<?php

namespace App\Repositories;

abstract class Repository
{
	abstract public function getModel();

	public function find($uuid)
	{
		$model = $this->getModel();
		$result = $model->find($uuid);
		return $result;
	}
	public function getWhere($columnName, $value)
	{
		$model = $this->getModel();
		$result = $model->where($columnName, $value)->get();
		return $result;
	}
	public function getWhereFirst($columnName, $value)
	{
		$model = $this->getModel();
		$result = $model->where($columnName, $value)->first();
		return $result;
	}
	public function delete($id)
	{
		$db = $this->getWhereFirst('id', $id);
		$db->delete();
	}

	public function getAll()
	{
		$model = $this->getModel();
		
		return $model->get();
	}
}
