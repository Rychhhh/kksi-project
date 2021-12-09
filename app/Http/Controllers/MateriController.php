<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Materi;
use App\Http\Requests\RequestCourse;
use DOMDocument;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course, Materi $materi)
    {
        return view('dashboard.materis.create', [
            'title' => 'Tambah materi',
            'course' => $course
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Course $course, Request $request)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];
        $validatedData = $request->validate($rules);

        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->content, LIBXML_HTML_NOIMPLIED |  LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
            $src = $image->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $fileName = uniqid() . time() . substr(md5(uniqid()), 0, 10);
                $filePath = '/content-image/' . $fileName . '.' . $mimeType;
                Image::make($src)->encode($mimeType, 100)->save(public_path($filePath));
                $newSrc = asset($filePath);
                $image->removeAttribute('src');
                $image->setAttribute('src', $newSrc);
            }
        }
        $validatedData['content'] = $dom->saveHTML();
        $validatedData['created_by'] = Auth::id();
        $validatedData['course_id'] = $course->id;

        Materi::create($validatedData);

        $redirect = 'course/total/' . $course->id;

        return redirect($redirect)->with('success', 'Data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Materi $materi)
    {
        return view('dashboard.materis.detail', [
            'title' => 'Detail | Materi',
            'materi' => $materi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Materi $materi)
    {
        return view('dashboard.materis.edit', [
            'title' => 'Edit materi',
            'materi' => $materi,
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Materi $materi)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->content, LIBXML_HTML_NOIMPLIED |  LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $domBefore = new DOMDocument();
        libxml_use_internal_errors(true);
        $domBefore->loadHTML($materi->content, LIBXML_HTML_NOIMPLIED |  LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        $imagesBefore = $domBefore->getElementsByTagName('img');

        $arrSrc = [];
        foreach ($images as $image) {
            $src = $image->getAttribute('src');
            array_push($arrSrc, $src);
        }

        $arrSrcBefore = [];
        foreach ($imagesBefore as $image) {
            $src = $image->getAttribute('src');
            array_push($arrSrcBefore, $src);
        }

        if (count(array_diff($arrSrc, $arrSrcBefore))) {
            $newImages = array_diff($arrSrc, $arrSrcBefore);
            foreach ($images as $image) {
                $src = $image->getAttribute('src');
                if (in_array($src, $newImages)) {
                    foreach ($newImages as $newSrcs) {
                        if ($newSrcs == $src) {
                            if (preg_match('/data:image/', $newSrcs)) {
                                preg_match('/data:image\/(?<mime>.*?)\;/', $newSrcs, $groups);
                                $mimeType = $groups['mime'];
                                $fileName = uniqid() . time() . substr(md5(uniqid()), 0, 10);
                                $filePath = '/content-image/' . $fileName . '.' . $mimeType;
                                Image::make($newSrcs)->encode($mimeType, 100)->save(public_path($filePath));
                                $newSrc = asset($filePath);
                                $image->removeAttribute('src');
                                $image->setAttribute('src', $newSrc);
                            }
                        }
                    }
                }
            }
        }

        foreach ($arrSrcBefore as $image) {
            if (!in_array($image, array_intersect($arrSrc, $arrSrcBefore))) {
                if (preg_match('#content-image#', $src)) {
                    Storage::disk('content-image')->delete(Arr::last(explode('/', $src)));
                }
            }
        }
        $validatedData['content'] = $dom->saveHTML();

        $materi->update($validatedData);
        return redirect('/materi')->with('success', 'Materi Has Been Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Materi $materi)
    {

        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($materi->content, LIBXML_HTML_NOIMPLIED |  LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $image) {
            $src = $image->getAttribute('src');
            if (preg_match('#content-image#', $src)) {
                Storage::disk('content-image')->delete(Arr::last(explode('/', $src)));
            }
        }
        $data = Materi::where('id', $materi->id);
        $data->delete();

        return redirect('/materi')->with('success', 'Materi Has Been Deleted !');
    }
}