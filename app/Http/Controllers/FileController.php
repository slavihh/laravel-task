<?php

namespace App\Http\Controllers;

use App\Services\FileService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FileController extends Controller
{
    private $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        $files = $this->fileService->getAll();
        return Inertia::render('File/Files', ['files' => $files]);
    }

    public function create()
    {
        return Inertia::render('File/Create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileMimeType = $file->getMimeType();
        $data = [
            "name" => $request->name,
            "type" => $fileMimeType,
            "path" => public_path(). '/files/' . date('Y-m-d') . '/',
            "original_name" => $request->name,
            "added_by" => $request->user(),
            "virtual_folder" => 1
        ];
        $this->fileService->create($data, $file);
        return Inertia::location('/files');
    }
}
