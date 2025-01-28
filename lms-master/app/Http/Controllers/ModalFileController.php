<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Illuminate\Http\Request;

class ModalFileController extends Controller
{
    public function create()
    {
        $this->authorize('file.create');
        return view('contents.admin.toolbox.file.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FileRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(FileRequest $request)
    {

        $this->authorize('file.create');
        File::create($this->setData($request));
        return redirect()
            ->route("file.index")
            ->with('success', __('file created successfully'));
    }
}
