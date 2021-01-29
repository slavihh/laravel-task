<?php


namespace App\Repositories;


use App\Models\Folder;

class FolderRepository
{
    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data) : Folder
    {
        return Folder::create($data);
    }

    /**
     * @param int $id
     * @return File|null
     */
    public function findOne(int $id) : ?Folder
    {
        return Folder::find($id);
    }

    /**
     * @return Folder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return Folder::all();
    }
}
