<?php

namespace App\Repositories\Generic;

use Illuminate\Support\Collection;

interface GenericRepositoryInterface
{
    function create(array $data);
    function bulkInsert(array $datas);
    function update(array $data, $id);
    function delete($id);
    function show($id);
    function getAll(): Collection;
}
