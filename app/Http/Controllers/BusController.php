<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\User;
use App\Models\SelectSeat;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

use GuzzleHttp\Exception\RequestException;

class BusController extends Controller
{
    public function index()
    {
        // Retrieve all buses from the database
        $buses = Bus::all();
        $users= User::all();
        $ticket= SelectSeat::all();

        $busesCount = Bus::count();
        $usersCount = User::count();
        $ticketCount = SelectSeat::count();

        // Pass the retrieved buses data to the view
        return view('admin.template', compact('buses','users','busesCount','usersCount','ticket','ticketCount'));
    }
    public function searchTicket(Request $request)
    {
        //  dd($request);
         if ($request->bus != null) {
            $ticket = SelectSeat::where('bus_id', $request->bus)->get();
        } else if ($request->datepicker != null) {
            $ticket = SelectSeat::where('date', $request->datepicker)->get();
        } else if ($request->datepicker != null && $request->bus != null) {
            $ticket = SelectSeat::where('bus_id', $request->bus)
                                ->whereDate('date', $request->datepicker)
                                ->get();
        } else {
            $ticket = SelectSeat::all();
        }

        $bus = Bus::all();
        $buses = Bus::all();
        $users= User::all();

        $busesCount = Bus::count();
        $usersCount = User::count();
        $ticketCount = SelectSeat::count();

        $pagination = $request->rowsPerPage;

        // Pass the retrieved buses data to the view
        return view('admin.root-view', compact('buses','users','busesCount','usersCount','ticket','ticketCount','pagination','bus'));

    }
    public function searchUser(Request $request)
    {
        //  dd($request);

        if ($request->userRole != null){
            $users= User::where('user_role', $request->userRole)->get();
        }elseif ($request->username != null) {
            $users = User::where('f_name', 'LIKE', '%' . $request->username . '%')
                         ->orWhere('l_name', 'LIKE', '%' . $request->username . '%')
                         ->get();
        }elseif(($request->userRole != null)&&($request->username != null)){
            $users = User::where('user_role', $request->userRole)
                 ->where(function ($query) use ($request) {
                     $query->where('f_name', 'LIKE', '%' . $request->username . '%')
                           ->orWhere('l_name', 'LIKE', '%' . $request->username . '%');
                 })
                 ->get();
        }else{
            $users= User::all();
        }
        $ticket = SelectSeat::all();
        $buses = Bus::all();

        $busesCount = Bus::count();
        $usersCount = User::count();
        $ticketCount = SelectSeat::count();

        $pagination = $request->rowsPerPage;

        // Pass the retrieved buses data to the view
        return view('admin.user-view', compact('buses','users','busesCount','usersCount','ticket','ticketCount','pagination'));

    }
    public function searchBus(Request $request)
    {
        // dd($request);

        if ($request->from != null) {
            $buses = Bus::where('start', $request->from)->get();
        } elseif ($request->to != null) {
            $buses = Bus::where('end', $request->to)->get();
        } elseif ($request->from != null && $request->to != null) {
            $buses = Bus::where('start', $request->from)
                        ->orWhere('end', $request->to)
                        ->get();
        } else {
            $buses = Bus::all();
        }

        $ticket = SelectSeat::all();

        $users= User::all();
        $busesCount = Bus::count();
        $usersCount = User::count();
        $ticketCount = SelectSeat::count();

        $pagination = $request->rowsPerPage;

        // Pass the retrieved buses data to the view
        return view('admin.bus-view', compact('buses','users','busesCount','usersCount','ticket','ticketCount','pagination'));

    }
    public function userview(Request $request)
    {
       // Retrieve all buses from the database
       $buses = Bus::all();
       $users= User::all();
       $ticket= SelectSeat::all();

       $busesCount = Bus::count();
       $usersCount = User::count();
       $ticketCount = SelectSeat::count();
       $pagination = 5;

       // Pass the retrieved buses data to the view
       return view('admin.user-view', compact('buses','users','busesCount','usersCount','ticket','ticketCount','pagination'));
    }
    public function busview(Request $request)
        {
        // Retrieve all buses from the database
        $buses = Bus::all();
        $users= User::all();
        $ticket= SelectSeat::all();

        $busesCount = Bus::count();
        $usersCount = User::count();
        $ticketCount = SelectSeat::count();
        $pagination = 5;


        // Pass the retrieved buses data to the view
        return view('admin.bus-view', compact('buses','users','busesCount','usersCount','ticket','ticketCount','pagination'));
    }
    public function rootview(Request $request)
        {
        // Retrieve all buses from the database
        $buses = Bus::all();
        $users= User::all();
        $ticket= SelectSeat::all();

        $busesCount = Bus::count();
        $usersCount = User::count();
        $ticketCount = SelectSeat::count();

        $pagination = 5;

        // Pass the retrieved buses data to the view
        return view('admin.root-view', compact('pagination','buses','users','busesCount','usersCount','ticket','ticketCount'));
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
            $userId = Auth::id();
            $busId = $request->bus_id;
            $date = $request->date;

            $bus = Bus::find($busId);
            $status = $bus->status;

            $bookedSeats = SelectSeat::where('bus_id', $busId)
                ->where('date', $date)
                ->pluck('seat_number')
                ->toArray();

            $client = new Client();

            $ipAddress = $request->input('ip_address');
            $apiKey = '6228418ade5911';

            try {
                $url = "https://ipinfo.io/{$ipAddress}/json?token={$apiKey}";

                $response = $client->get($url);
                $data = json_decode($response->getBody(), true);

                if (isset($data['loc'])) {
                    list($latitude, $longitude) = explode(',', $data['loc']);
                    $latitude = (float) $latitude;
                    $longitude = (float) $longitude;
                    $markers = $latitude . ', ' . $longitude;

                    return view('booking.seat', compact('userId', 'busId', 'date', 'bookedSeats', 'bus', 'data', 'latitude', 'longitude', 'markers','status'));
                } else {
                    // 'loc' key is not present in the response
                    // Handle the error or redirect accordingly
                    return redirect()->back()->with('error', 'Location information not available.');
                }
            } catch (\Exception $e) {
                // Handle cURL or JSON decoding errors
                return redirect()->back()->with('error', 'Error retrieving location information.');
            }
        } else {
            return redirect()->route('register');
        }
    }

    public function select(Request $request)
    {
        // dd($request);


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
                        'pay-button'
                    ]);

        $allSeatNumbers[] = $seatNumber;
                }


            }

        $userId = $request->user_id;
        $busId = $request->bus_id;
        $date = $request->date;
        $price = $request->price;
        Payment::create([
            'user_id' => $userId,
            'bus_id' => $busId,
            'date' => $date,
            'price' => $price,
        ]);
// dd($busId);
        $bus = Bus::find($busId);
        $status = $bus->status;
        $bus_number =$bus->bus_number;
        // dd($bus_number);
        $bookedSeats = SelectSeat::where('bus_id', $busId)
            ->where('date', $date)
            ->pluck('seat_number')
            ->toArray();

        // Return a response indicating success
        $client = new Client();
        $details = [
            'user_id' => $userId,
            'bus_id' => $bus_number,
            'date' => $date,
            'seat_numbers' => $allSeatNumbers, // Pass the array of seat numbers
            // Add other details as needed
            'price' =>$price,
        ];
// dd($details);
            Mail::to('menulsuwahas@gmail.com')->send(new ContactFormMail($details));
            // Send booking confirmation email to your email address


            $ipAddress = $request->input('ip_address');
            $apiKey = '6228418ade5911';

            try {
                $url = "https://ipinfo.io/{$ipAddress}/json?token={$apiKey}";

                $response = $client->get($url);
                $data = json_decode($response->getBody(), true);

                if (isset($data['loc'])) {
                    list($latitude, $longitude) = explode(',', $data['loc']);
                    $latitude = (float) $latitude;
                    $longitude = (float) $longitude;
                    $markers = $latitude . ', ' . $longitude;

                    return view('booking.seat', compact('userId', 'busId', 'date', 'bookedSeats', 'bus', 'data', 'latitude', 'longitude', 'markers','status'));
                } else {
                    // 'loc' key is not present in the response
                    // Handle the error or redirect accordingly
                    return redirect()->back()->with('error', 'Location information not available.');
                }
            } catch (\Exception $e) {
                // Handle cURL or JSON decoding errors
                return redirect()->back()->with('error', 'Error retrieving location information.');
            }
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

    public function addUser(){
        $buses = Bus::all();

        return view('admin.add-user',compact('buses'));
    }
    public function edit(Request $request,$id)
    {
        // dd($id);
    }

    public function destroy(Request $request, $id)
    {
        $SelectSeat = SelectSeat::find($id);

            if(!$SelectSeat) {
                abort(404);
            }

            $SelectSeat->delete();

            return redirect()->back()->with('success', 'Bus deleted successfully');
    }
    public function addDriver(){
        $buses = Bus::all();
        return view('admin.add-driver',compact('buses'));
    }
    public function send($busId) {
        // Use $busId as needed
        $buses = Bus::all();

        // Assuming you have a 'status' column in your buses table
        $bus = Bus::find($busId);

        if ($bus) {
            // Update the status to your desired value
            $bus->update(['status' => 'send']);
        }

        return view('driver.driver-home', compact('busId'));
    }

    public function stop($busId) {
        // Use $busId as needed
        $buses = Bus::all();

        // Assuming you have a 'status' column in your buses table
        $bus = Bus::find($busId);

        if ($bus) {
            // Update the status to your desired value
            $bus->update(['status' => 'stop']);
        }
        return view('driver.driver-home',compact('busId'));
    }


}
