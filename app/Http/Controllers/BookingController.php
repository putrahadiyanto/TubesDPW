<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Booking;
use App\Models\Armada;
use App\Models\User;

class BookingController extends Controller
{

    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function pay(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Ensure the booking belongs to the authenticated user
        if ($booking->id_user !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized action.'], 403);
        }

        // Generate a unique order ID using booking ID, timestamp, and unique identifier
        $uniqueId = Str::uuid()->toString(); // Generate a unique identifier
        $orderId = $booking->id . '_' . time() . '_' . $uniqueId;

        $params = [
            'transaction_details' => [
                'order_id' => $orderId, // Use the unique order ID
                'gross_amount' => $booking->harga,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => $booking->no_telp,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            // Update status_pembayaran to 'lunas' (paid) after successful payment
            $booking->status_pembayaran = 'lunas';
            $booking->save();

            return response()->json(['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // buat liat form booking
    public function order_booking(string $id)
    {
        $armada = Armada::findOrFail($id);
        return view('booking.book', compact('armada'));
    }

    // buat liat data booking
    public function show_booking($id)
    {
        // Retrieve the booking by ID
        $booking = booking::find($id);

        // Check if booking exists and the current user is the one who booked it
        if ($booking && $booking->id_user == Auth::id()) {
            // Return the booking details view with the booking data
            return view('booking.show', ['booking' => $booking]);
        }

        // If booking doesn't exist or user doesn't match, redirect to homepage
        return redirect('/');
    }

    // buat cancel booking
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        if ($booking->status_booking == 'proses') {
            $booking->status_booking = 'batal'; // or any status you want to set
            $booking->save();
        }
        return redirect()->route('show.booking', $booking->id);
    }

    public function index_booking()
    {
        // Get the ID of the authenticated user
        $userId = auth()->id();

        // Retrieve all bookings associated with the user, sorted by status_booking (proses first)
        $bookings = Booking::where('id_user', $userId)
                        ->orderByRaw("FIELD(status_booking, 'proses') DESC")
                        ->orderBy('created_at', 'desc') // Additional sorting by creation date if needed
                        ->get();

        // Pass the bookings data to the view
        return view('booking.index', compact('bookings'));
    }


    /**
     * Display a listing of the bookings.
     */
    public function index()
    {
        $bookings = Booking::with('armada', 'user')->get();
        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new booking.
     */
    public function create()
    {
        $armadas = Armada::all();
        return view('bookings.create', compact('armadas'));
    }

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        // Check for overlapping bookings
        $overlappingBooking = Booking::where('id_armada', $request->id_armada)
            ->where('status_booking', 'proses')
            ->where(function ($query) use ($request) {
                $query->whereBetween('tanggal_mulai', [$request->tanggal_mulai, $request->tanggal_akhir])
                    ->orWhereBetween('tanggal_akhir', [$request->tanggal_mulai, $request->tanggal_akhir])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('tanggal_mulai', '<=', $request->tanggal_mulai)
                            ->where('tanggal_akhir', '>=', $request->tanggal_akhir);
                    });
            })
            ->first();

        if ($overlappingBooking) {
            return redirect()->back()->with('error', 'Kendaraan ini sudah dipesan pada tanggal tsb, silakan pilih tanggal atau mobil lain');
        }

        // If no overlapping bookings, create the booking
        $booking = Booking::create([
            'id_armada' => $request->id_armada,
            'id_user' => $request->id_user,
            'tanggal_pembuatan' => now(),
            'no_telp' => $request->no_telp,
            'supir' => $request->has('supir'),
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'harga' => $request->harga,
            'status_booking' => 'proses',
            'status_pembayaran' => 'belum dibayar',
        ]);

        return redirect()->route('show.booking', ['id' => $booking->id])->with('success', 'Booking successfully created!');
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {

        return view('admin.booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified booking.
     */
    public function edit(Booking $booking)
    {
        $armadas = Armada::all();
        return view('admin.booking.edit', compact('booking', 'armadas'));
    }

    /**
     * Update the specified booking in storage.
     */
    public function update(Request $request, Booking $booking)
    {
    
        // Update the booking with the request data
        $booking->update([
            'no_telp' => $request->input('no_telp'),
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'tanggal_akhir' => $request->input('tanggal_akhir'),
            'harga' => $request->input('harga'),
            'supir' => $request->has('supir'),
            'status_booking' => $request->input('status_booking'),
            'status_pembayaran' => $request->input('status_pembayaran')
        ]);
    
        // Redirect back to the booking index page with a success message
        return redirect()->route('booking.index')->with('success', 'Booking successfully updated!');
    }
    


    /**
     * Remove the specified booking from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('booking.index')->with('success', 'Booking successfully deleted!');
    }
}
