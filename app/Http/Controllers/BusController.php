<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\User;
use App\Models\SelectSeat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusController extends Controller
{
    public function index()
    {
        // Retrieve all buses from the database
        $buses = Bus::all();
        $users= User::all();

        $busesCount = Bus::count();
        $usersCount = User::count();

        // Pass the retrieved buses data to the view
        return view('admin.template', compact('buses','users','busesCount','usersCount'));
    }

    public function register(Request $request)
    {
        // dd($request);
        // Validate the incoming request data, including the uploaded file
        $request->validate([
            'busnumber' => 'required',
            'rootnumber' => 'required',
            'type' => 'required',
            'start' => 'required',
            'starttime' => 'required',
            'end' => 'required',
            'price'=>'required',
            'endtime' => 'required',
            'description' => 'required',
            'image' => 'required|image', // Assuming maximum file size is 2MB and only image files are allowed
        ]);

        try {
            // Store the uploaded image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images'), $image_name);
            }

            // Create a new Bus instance
            $bus = new Bus();
            $bus->bus_number = $request->busnumber;
            $bus->root_number = $request->rootnumber;
            $bus->type = $request->type;
            $bus->start = $request->start;
            $bus->starttime = $request->starttime;
            $bus->end = $request->end;
            $bus->endtime = $request->endtime;
            $bus->description = $request->description;
            $bus->price = $request->price;
            $bus->image = $image_name; // Assign the image name to the image field
            $bus->save();

            // Redirect back after successful upload
            return redirect()->back()->with('success', 'Bus registered successfully');
        } catch (\Exception $e) {
            // If an error occurs, handle it here
            return redirect()->back()->with('error', 'Failed to register bus: ' . $e->getMessage());
        }
    }
    public function search(Request $request)
    {
        // Retrieve search parameters from the request
        $from = $request->from;
        $to = $request->to;
        $type = $request->type;

        // Query to filter buses based on search parameters
        $busesQuery = Bus::query();
        $busx=Bus::all();

        // Apply filters if search parameters are provided
        if ($from) {
            $busesQuery->where('start', 'LIKE', '%' . $from . '%');
        }
        if ($to) {
            $busesQuery->where('end', 'LIKE', '%' . $to . '%');
        }
        if ($type) {
            $busesQuery->where('type', 'LIKE', '%' . $type . '%');
        }

        // Get the filtered buses or all buses if no filters are applied
        $buses = $busesQuery->get();

        // Pass the buses to the view
        return view('booking.booking', compact('buses','busx'));
    }

    public function seat(Request $request)
    {
        // dd($request);
        if (Auth::check()) {
            // Get the authenticated user's ID
            $userId = Auth::id();

            // Retrieve other request parameters
            $busId = $request->bus_id;
            $date = $request->date;

            // Fetch the bus details
            $bus = Bus::find($busId);

            // Fetch booked seats for the bus and date
            $bookedSeats = SelectSeat::where('bus_id', $busId)
                ->where('date', $date)
                ->pluck('seat_number')
                ->toArray();

            // Pass the necessary data to the view
            return view('booking.seat', compact('userId', 'busId', 'date', 'bookedSeats', 'bus'));
        } else {
            // User is not authenticated, redirect to the registration page
            return redirect()->route('register');
        }
    }

public function select(Request $request)
{
    try {
        // Retrieve the array of selected seat numbers from the request
        $seatNumbersArray = $request->input('selectedSeats');

        // Loop through each element of the array
        foreach ($seatNumbersArray as $seatNumbersString) {
            // Split the string into an array of seat numbers and convert each element to an integer
            $seatNumbers = array_map('intval', explode(',', $seatNumbersString));

            // Loop through each selected seat number and create a new SelectSeat record for it
            foreach ($seatNumbers as $seatNumber) {
                // Create a new instance of SelectSeat model and save data
                SelectSeat::create([
                    'seat_number' => $seatNumber,
                    'user_id' => $request->user_id,
                    'bus_id' => $request->bus_id,
                    'date' => $request->date,
                ]);
            }
        }
        $userId=$request->user_id;
        $busId=$request->bus_id;
        $date=$request->date;
        $bus = Bus::find($busId);

        $bookedSeats = SelectSeat::where('bus_id', $busId)
                ->where('date', $date)
                ->pluck('seat_number')
                ->toArray();
        // Return a response indicating success
        return view('booking.seat', compact('userId', 'busId', 'date', 'bookedSeats', 'bus'));
    } catch (\Exception $e) {
        // Return a response indicating failure if an error occurs
        return response()->json(['message' => 'Failed to select seats', 'error' => $e->getMessage()], 500);
    }
}

public function editBus($id)
{
    $bus = Bus::find($id);
    // dd($bus);
    if(!$bus) {
        abort(404);
    }

    return view('admin.edit-bus', compact('bus'));
}

public function deleteBus($id)
{
    $bus = Bus::find($id);

    if(!$bus) {
        abort(404);
    }

    $bus->delete();

    return redirect()->back()->with('success', 'Bus deleted successfully');
}
public function updateBus(Request $request, $id)
{
    $bus = Bus::find($id);

    if(!$bus) {
        abort(404);
    }

    $bus->bus_number = $request->input('busnumber');
    $bus->root_number = $request->input('rootnumber');
    $bus->type = $request->input('type');
    $bus->price = $request->input('price');
    $bus->start = $request->input('start');
    $bus->starttime = $request->input('starttime');
    $bus->end = $request->input('end');
    $bus->endtime = $request->input('endtime');
    $bus->description = $request->input('description');

    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($bus->image) {
            $oldImagePath = public_path('assets/images') . '/' . $bus->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Upload new image
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->move(public_path('assets/images'), $image_name);
        $bus->image = $image_name;
    }

    $bus->save();

    return redirect()->back()->with('success', 'Bus details updated successfully');
}


}
