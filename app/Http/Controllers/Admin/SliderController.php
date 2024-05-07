<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index() {
        $sliders = Slider::all();

        return view('admin.slider.index', compact('sliders'));
    }

    public function create() {
        return view('admin.slider.create');
    }

    public function store(SliderRequest $request) {
        $validatedData = $request->validated();

        // Proses Input Image
        if($request->hasFile('image')) {
            $file       = $request->file('image');
            $extention  = $file->getClientOriginalExtension();
            $fileName   =time().'.'.$extention;

            // Akan disimpan di folder
            $file->move('upload/slider', $fileName);

            // Akan disimpan di database
            $validatedData['image'] = "upload/slider/$fileName";
        }

        // Proses Input Status
        $validatedData['status'] = $request->status == true ? '1' : '0';

        Slider::create([
            'title'         => $validatedData['title'],
            'description'   => $validatedData['description'],
            'image'         => $validatedData['image'],
            'status'        => $validatedData['status']
        ]);

        return redirect()->route('slider-index')->with('message', 'Added Slider Successfully');
    }

    public function edit(Slider $slider) {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider) {
        $validatedData = $request->validated();

        
        // Proses Input Image
        if($request->hasFile('image')) {

            $destination = $slider->image;

            if(File::exists($destination)) {
                File::delete($destination);
            }

            $file       = $request->file('image');
            $extention  = $file->getClientOriginalExtension();
            $fileName   =time().'.'.$extention;

            // Akan disimpan di folder
            $file->move('upload/slider', $fileName);

            // Akan disimpan di database
            $validatedData['image'] = "upload/slider/$fileName";
        }

        // Proses Input Status
        $validatedData['status'] = $request->status == true ? '1' : '0';

        Slider::where('id', $slider->id)->update([
            'title'         => $validatedData['title'],
            'description'   => $validatedData['description'],
            'image'         => isset($validatedData['image']) ? $validatedData['image'] : $slider->image,
            'status'        => $validatedData['status']
        ]);

        // Jika $validatedData['image'] di-set, tambahkan atribut 'image' ke data yang akan di-update
        // BTW ini dari ChatGPT
        // if(isset($validatedData['image'])) {
        //     $dataToUpdate['image'] = $validatedData['image'];
        // }

        // Slider::where('id', $slider->id)->update($dataToUpdate);

        return redirect()->route('slider-index')->with('message', 'Updated Slider Successfully');
    }

    public function delete(Slider $slider) {
        // Hapus data image
        if($slider->count() > 0) {
            $destination = $slider->image;

            if(File::exists($destination)) {
                File::delete($destination);
            }

            $slider->delete();

            return redirect()->route('slider-index')->with('message', 'Deleted Slider Successfully');
        }
        return redirect()->route('slider-index')->with('message', 'No Data');
    }
}
