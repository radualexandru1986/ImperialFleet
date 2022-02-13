<?php

namespace App\Contracts;

interface BaseContract
{
    public function store();

    public function edit(int $id);

    public function delete(int $id);
}
