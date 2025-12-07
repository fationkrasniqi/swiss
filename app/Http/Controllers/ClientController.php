<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function create()
    {
        $serviceKeys = [
            'service_elderly_care',
            'service_hygiene',
            'service_hair',
            'service_eating',
            'service_medication',
            'service_monitoring',
            'service_activities'
        ];
        
        $services = [];
        foreach ($serviceKeys as $key) {
            $services[] = __('services.' . $key);
        }
        
        $cantons = [
            'Zurich', 'Bern', 'Luzern', 'Uri', 'Schwyz', 'Obwalden', 'Nidwalden',
            'Glarus', 'Zug', 'Fribourg', 'Solothurn', 'Basel-Stadt', 'Basel-Landschaft',
            'Schaffhausen', 'Appenzell A.Rh.', 'Appenzell I.Rh.', 'St. Gallen',
            'Graubünden', 'Aargau', 'Thurgau', 'Ticino', 'Valais', 'Neuchâtel',
            'Jura', 'Genève', 'Vaud'
        ];
        return view('clients.create', compact('services','cantons'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone_prefix' => 'required|string|max:10',
            'phone_number' => 'required|string|max:20',
            'canton' => 'required|string|max:255',
            'services' => 'required|array|min:1',
            'hours' => 'required|integer|min:1|max:24',
            'total_price' => 'required|integer|min:0',
            'service_date' => 'nullable|date|after_or_equal:today',
        ]);
        $data['services'] = implode(',', $data['services']);
        $client = Client::create($data);

        // Send email automatically to client
        try {
            $emailBody = "Pershendetje {$client->first_name},\n\n";
            $emailBody .= "Kerkesa juaj u pranua me sukses!\n\n";
            $emailBody .= "Detajet:\n";
            $emailBody .= "Emri: {$client->first_name} {$client->last_name}\n";
            $emailBody .= "Email: {$client->email}\n";
            $emailBody .= "Telefoni: {$client->phone_prefix} {$client->phone_number}\n";
            $emailBody .= "Sherbimet: {$client->services}\n";
            $emailBody .= "Kantoni: {$client->canton}\n";
            $emailBody .= "Ore: {$client->hours}\n";
            
            if ($client->service_date) {
                $serviceDate = \Carbon\Carbon::parse($client->service_date)->format('d M Y');
                $emailBody .= "Data e sherbimit: {$serviceDate}\n";
            }
            
            $emailBody .= "Totali: {$client->total_price} CHF\n\n";
            $emailBody .= "Faleminderit!";
            
            \Mail::raw($emailBody, function($message) use ($client) {
                $message->to($client->email)
                    ->subject('Kerkesa u pranua');
            });
        } catch (\Exception $e) {
            // Optional: log error
        }

        return redirect()->back()->with('status', 'Request sent — admin will review it.');
    }

    public function adminIndex()
    {
        $clients = Client::orderBy('created_at','desc')->paginate(20);
        return view('admin.clients.index', compact('clients'));
    }
    public function sendEmail(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $email = $request->input('email', $client->email);
        $name = $request->input('name', $client->first_name . ' ' . $client->last_name);

        try {
            \Mail::raw(
                "Pershendetje $name,\n\nKerkesa juaj u pranua nga admini!\n\nDetajet:\nSherbimet: {$client->services}\nKantoni: {$client->canton}\nOre: {$client->hours}\nTotali: {$client->total_price} CHF\n\nFaleminderit!",
                function($message) use ($email) {
                    $message->to($email)
                        ->subject('Kerkesa u pranua nga admini');
                }
            );
            return redirect()->back()->with('status', 'Email u dërgua me sukses!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Dërgimi i emailit dështoi.');
        }
    }

    public function viewPdf($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.pdf', compact('client'));
    }

    public function downloadPdf($id)
    {
        $client = Client::findOrFail($id);

        // Use barryvdh/laravel-dompdf's PDF facade if installed
        if (class_exists('Barryvdh\DomPDF\Facade\Pdf') || class_exists('PDF')) {
            try {
                $pdf = \PDF::loadView('admin.clients.pdf', compact('client'));
                return $pdf->download('client-request-' . $client->id . '.pdf');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to generate PDF.');
            }
        }

        // Fallback: trigger browser download as PDF (HTML content with PDF extension)
        return response()->view('admin.clients.pdf', compact('client'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="client-request-' . $client->id . '.pdf"');
    }
}