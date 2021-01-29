<?php


namespace App\Repositories;

use App\Models\File;

class FileRepository
{
    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data) : File
    {
        return File::create($data);
    }

    /**
     * @param int $id
     * @return File|null
     */
    public function findOne(int $id) : ?File
    {
        return File::find($id);
    }

    /**
     * @return File[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return File::all();
    }
}
