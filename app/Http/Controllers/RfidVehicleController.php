<?php

namespace App\Http\Controllers;

use App\Models\ParkingSlot;
use App\Models\ParkingZone;
use App\Models\RfidVehicle;
use Illuminate\Http\Request;

class RfidVehicleController extends Controller
{

    public function index()
    {
        if (\Auth::user()->can('manage rfid vehicle')) {
            $vehicles = RfidVehicle::where('parent_id', '=', parentId())->get();
            return view('rfid_vehicle.index', compact('vehicles'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        $zones = ParkingZone::where('parent_id', parentId())->get()->pluck('zone_name', 'id');
        $zones->prepend(__('Select Zone'), '');

        return view('rfid_vehicle.create', compact('zones'));
    }


    public function store(Request $request)
    {
        if (\Auth::user()->can('create rfid vehicle')) {
            $validator = \Validator::make(
                $request->all(), [
                    'zone' => 'required',
                    'type' => 'required',
                    'floor' => 'required',
                    'vehicle_no' => 'required',
                    'rfid_no' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $vehicle = new RfidVehicle();
            $vehicle->zone = $request->zone;
            $vehicle->type = $request->type;
            $vehicle->floor = $request->floor;
            $vehicle->slot = $request->slot;
            $vehicle->vehicle_no = $request->vehicle_no;
            $vehicle->rfid_no = $request->rfid_no;
            $vehicle->name = $request->name;
            $vehicle->phone_number = $request->phone_number;
            $vehicle->notes = $request->notes;
            $vehicle->parent_id = parentId();
            $vehicle->save();

            return redirect()->back()->with('success', __('RFID vehicle successfully created.'));

        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function show(RfidVehicle $rfidVehicle)
    {
        //
    }


    public function edit(RfidVehicle $rfidVehicle)
    {
        $zones = ParkingZone::where('parent_id', parentId())->get()->pluck('zone_name', 'id');
        $zones->prepend(__('Select Zone'), '');

        $slots = ParkingSlot::where('zone', $rfidVehicle->zone)->get()->pluck('title', 'id');

        return view('rfid_vehicle.edit', compact('zones','rfidVehicle','slots'));
    }


    public function update(Request $request, RfidVehicle $rfidVehicle)
    {
        if (\Auth::user()->can('edit rfid vehicle')) {
            $validator = \Validator::make(
                $request->all(), [
                    'zone' => 'required',
                    'type' => 'required',
                    'floor' => 'required',
                    'vehicle_no' => 'required',
                    'rfid_no' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $rfidVehicle->zone = $request->zone;
            $rfidVehicle->type = $request->type;
            $rfidVehicle->floor = $request->floor;
            $rfidVehicle->slot = $request->slot;
            $rfidVehicle->vehicle_no = $request->vehicle_no;
            $rfidVehicle->rfid_no = $request->rfid_no;
            $rfidVehicle->name = $request->name;
            $rfidVehicle->phone_number = $request->phone_number;
            $rfidVehicle->notes = $request->notes;
            $rfidVehicle->save();

            return redirect()->back()->with('success', __('RFID vehicle successfully updated.'));

        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(RfidVehicle $rfidVehicle)
    {
        if (\Auth::user()->can('delete rfid vehicle')) {
            $rfidVehicle->delete();
            return redirect()->back()->with('success', 'RFID vehicle successfully deleted.');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
