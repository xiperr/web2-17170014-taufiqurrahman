<?php
namespace App\Http\Controllers;

use App\Reminder;
use Illuminate\Http\Request;
use Auth;//Illuminate\Support\Facades\Auth;

class ReminderControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reminders = Reminder::all();
        return view('reminders.index',compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reminder =  new Reminder();
        $interval = $reminder->getEnumTimeUnit();
        
        return View('reminders.create',compact('interval'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data); // mencetak keluaran / debugging output
        /*if (isset($data['_token'])) {
            unset($data['_token']); //hapus token dari data
        }*/

        if (Auth::user()) {
            $data['created_by'] = Auth::user()->id;
        }
        /*
        if (class_exists('Auth')) {
            $data['created_by'] = Auth::user()->id;
        }*/
        
        $request->validate([
            'label' => 'required',
            'due_date' => 'required',
        ]);

        $tugas = new Reminder($data);
        $tugas->save();
        return redirect('reminders')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        //
        echo "ini show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reminder           = Reminder::findOrFail($id);
        $reminder_model     = new Reminder();
        $interval           = $reminder_model->getEnumTimeUnit();

        return view('reminders.edit',compact('reminder','interval'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reminder $reminder)
    {
        $data = $request->all();
        $reminder->update($data);
        return redirect('reminders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reminder $reminder)
    {
        //
        $reminder->delete();
        return redirect('reminders');
    }
}
