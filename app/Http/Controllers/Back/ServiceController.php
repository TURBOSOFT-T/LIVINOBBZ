<?php

namespace App\Http\Controllers\Back;

use App\DataTables\ServicesDataTable;
use App\Http\{
    Controllers\Controller,
};
use App\Http\Requests\Back\ServiceRequest;
use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Symfony\Component\HttpKernel\DependencyInjection\ResettableServicePass;
use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\File;


class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ServicesDataTable $dataTable)
    {
        return $dataTable->render('back.shared.index');
    }


    public function create()
    {
        return view('back.services.form');
    }


    public function store(ServiceRequest $request)
    {

        $fileUpload = new Service();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $image->move('uploads', $fileName);
            $fileUpload->title = $request->title;
            $fileUpload->slug = $request->slug;
            $fileUpload->body = $request->body;
            $fileUpload->image = $fileName;
            $fileUpload->save();

            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
    }


    protected function saveImages($request)
    {
        $image = $request->file('image');
        $name = time() . '.' . $image->extension();
        $img = InterventionImage::make($image->path());
        $img->widen(800)->encode()->save(public_path('/images/') . $name);
        $img->widen(400)->encode()->save(public_path('/images/thumbs/') . $name);
        return $name;
    }
    protected function getInputs($request)
    {
        $inputs = $request->except(['image']);
        $inputs['active'] = $request->has('active');
        if ($request->image) {
            $inputs['image'] = $this->saveImages($request);
        }
        return $inputs;
    }


    protected function deleteImages($home)
    {
        File::delete([
            public_path('/images/') . $home->image,
            public_path('/images/thumbs/') . $home->image,
        ]);
    }


    public function edit(Service $service)
    {
        return view('back.services.form', ['service' => $service]);
    }


    public function update(ServiceRequest $request, Service $home)
    {
        $inputs = $this->getInputs($request);
        if ($request->has('image')) {
            $this->deleteImages($home);
        }
        $home->update($inputs);
        return back()->with('alert', config('messages.heroupdated'));
    }


    public function destroy(Service $home)
    {
        $this->deleteImages($home);
        $home->delete();
        return redirect(route('heros.index'));
    }


    public function alert(Service $home)
    {
        return view('back.homes.destroy', ['home' => $home]);
    }
}