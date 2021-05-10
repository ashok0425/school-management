<?php

namespace App\Http\Controllers\School;

use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Klass;
use App\Models\Notification;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
/**
 * Class CalendarController
 * @package App\Http\Controllers\School
 */
class NotificationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(){
        
        $notification=DB::table('notifications')->join('klasses','klasses.id','notifications.class')->join('sections','sections.id','notifications.section')->select('notifications.*','klasses.class as kla','sections.section as sec')->orderBy('id','desc')->get();
      
        return view('admin.school.notification.index', compact('notification'));
    }

    public function create(){
        $class=Klass::all();
        $section=Section::all();
        return view('admin.school.notification.form',compact('class','section'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|max:200|mimes:png,jpg,jpeg',
            'type' => 'required|max:50',

        ]);

        $noti=new Notification;
        $noti->title=$request->title;
        $noti->description=$request->description;
        $noti->type=$request->type;
        $noti->class=$request->class;
        $noti->section=$request->section;
        $file = $request->image;
        $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('upload_del/lyceex/notification/', $filename);
        $noti->image=$path;
        if($noti->save()){
            $notification = array(
                'message' => 'Notification add.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Notification not add.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification); 
        }
       
       
    }
    public function GetSection($id)
    {
        $data=section::where('class_id',$id)->get();
        $datas="";
        foreach($data as $item ){
            $datas.="<option value='";
            $datas.=$item->id;
            $datas.="'>";
            $datas.=$item->section;
            $datas.="</option>";

        }
        return response()->json($datas); 
    }
    public function delete()
    {
        try{
            $params=__decryptToken();
            unlink('storage/'.Notification::where('id',$params->notification_id)->value('image'));
            Notification::where('id',$params->notification_id)->delete();
            
            $notification = array(
                'message' => 'Notification Deleted Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('school.notification.index')->with($notification);
            
        }catch(\Exception $e){
            $notification = array(
            'message' => 'Something went wrong! Please try later', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
