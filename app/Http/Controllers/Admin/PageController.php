<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages  = Page::all();
        return view('admin.admin.page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.page.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'page'=>'required|string|max:191',
            'content'=>'required',
        ]);
        // try{
            $page = new Page;
            $page->page = $request->page;
            $page->content = $request->content;
            
            $page->save();
            $notification = array(
                'message' => 'Page Saved Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.page.index')->with($notification);
            
        // }catch(\Exception $e){
        //     $notification = array(
        //     'message' => 'Something went wrong! Please try later', 
        //     'alert-type' => 'error'
        //     );
        //     return redirect()->back()->with($notification);
        // }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.admin.page.form',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $this->validate($request,[
            'page'=>'required|string|max:191',
            'content'=>'required',
        ]);
        // try{
            $page->page = $request->page;
            $page->content = $request->content;
            // $page->slug = null;
            $page->save();
            $notification = array(
                'message' => 'Page Updated Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.page.index')->with($notification);
            
        // }catch(\Exception $e){
        //     $notification = array(
        //     'message' => 'Something went wrong! Please try later', 
        //     'alert-type' => 'error'
        //     );
        //     return redirect()->back()->with($notification);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        try{
            $page->delete();
            $notification = array(
                'message' => 'Page Deleted Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.page.index')->with($notification);
            
        }catch(\Exception $e){
            $notification = array(
            'message' => 'Something went wrong! Please try later', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function fileUpload(Request $request){
        $this->validate($request,[
            'file'=>'image|required|max:1000|mimes:jpeg,jpg,gif',
        ]);
        $file = $request->file;
        $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('page', $filename);
        return Storage::url($path); 
    }
}
