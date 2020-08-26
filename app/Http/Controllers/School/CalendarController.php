<?php

namespace App\Http\Controllers\School;

use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Calendar;
use Illuminate\Support\Facades\Auth;

/**
 * Class CalendarController
 * @package App\Http\Controllers\School
 */
class CalendarController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     * @throws \Exception
     */
    public function index()
    {
        $events = Events::where('school_id',Auth::guard('school')->user()->id)->get();
        $event_list = [];
        foreach ($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->event_name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date . ' +1 day')
            );
        }
        $calendar_details = Calendar::addEvents($event_list);

        return view('admin.school.calander.index', compact('calendar_details'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'event_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Events::create([
            'event_name' => request('event_name'),
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'school_id' => Auth::guard('school')->user()->id,
        ]);
        $notification = array(
            'message' => 'Event add.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
