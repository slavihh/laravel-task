<?php


namespace App\Services;


use App\Repositories\FolderRepository;

/**
 * Class FolderService
 * @package App\Services
 */
class FolderService
{
    /**
     * @var FolderRepository
     */
    private $folderRepo;

    /**
     * FolderService constructor.
     * @param FolderRepository $folderRepo
     */
    public function __construct(FolderRepository $folderRepo)
    {
        $this->folderRepo = $folderRepo;
    }

    /**
     * @param array $data
     * @return \App\Models\Folder|mixed
     */
    public function create(array $data)
    {
        return $this->folderRepo->store($data);
    }

    /**
     * @param int $id
     * @return \App\Models\Folder|\App\Repositories\File|null
     */
    public function getOne(int $id)
    {
        return $this->folderRepo->findOne($id);
    }

    /**
     * @return \App\Models\Folder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->folderRepo->findAll();
    }
}
