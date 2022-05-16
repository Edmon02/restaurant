<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::where('status', TableStatus::Avaliable)->get();
        return view('admin.reservation.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number){
            return back()->with('warning', 'Please choose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach($table->rservations as $res){
            if($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')){
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }
        Reservation::create($request->validated());

        return to_route('admin.reservation.index')->with('success', 'Rservation created successfully');
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
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', TableStatus::Avaliable)->get();
        return view('admin.reservation.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number){
            return back()->with('warning', 'Please choose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        $reservations = $table->rservations()->where('id', '!=', $reservation->id)->get();
        foreach($reservations as $res){
            if($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')){
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }

        $reservation->update($request->validated());
        return to_route('admin.reservation.index')->with('success', 'Rservation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return to_route('admin.reservation.index')->with('warning', 'Rservation deleted successfully');
    }
}
