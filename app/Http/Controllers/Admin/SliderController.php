<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

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
}
