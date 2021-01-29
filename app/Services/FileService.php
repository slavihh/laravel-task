<?php


namespace App\Services;


use App\Repositories\FileRepository;

/**
 * Class FileService
 * @package App\Services
 */
class FileService
{
    /**
     * @var FileRepository
     */
    private $fileRepo;

    /**
     * FileService constructor.
     * @param FileRepository $fileRepo
     */
    public function __construct(FileRepository $fileRepo)
    {
        $this->fileRepo = $fileRepo;
    }

    /**
     * @param array $data
     * @return \App\Models\File|mixed
     */
    public function create(array $data, $file)
    {
        $file->move($data['path']);
        return $this->fileRepo->store($data);
    }

    /**
     * @param int $id
     * @return \App\Models\File|null
     */
    public function getOne(int $id)
    {
        return $this->fileRepo->findOne($id);
    }

    /**
     * @return \App\Models\File[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->fileRepo->findAll();
    }
}
