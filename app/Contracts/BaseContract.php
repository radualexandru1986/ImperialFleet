<?php

namespace App\Contracts;

interface BaseContract
{
    public function store();

    public function update(int $id);

    public function delete(int $id);
}
