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
            // Exact German confirmation message requested by user (hardcoded contact)
            $germanBody = "Guten Tag\n\n" .
                "Vielen Dank für Ihre Anfrage und das Vertrauen in Janira Care – Pflege durch Angehörige.\n" .
                "Wir haben Ihre Angaben erfolgreich erhalten.\n\n" .
                "Unser Team prüft nun Ihre Anfrage sorgfältig. Wir melden uns innert 24 Stunden bei Ihnen, um die nächsten Schritte zu besprechen und allfällige Fragen zu klären.\n\n" .
                "Wir freuen uns darauf, Sie zu unterstützen und gemeinsam eine passende Lösung für Ihre Situation zu finden.\n\n" .
                "Freundliche Grüsse\n" .
                "Janira Care\n" .
                "📞 Telefon: +41 71 422 77 77\n" .
                "📧 E-Mail: info@janiracare.ch\n";

            \Mail::raw($germanBody, function($message) use ($client) {
                $message->to($client->email)
                    ->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Ihre Anfrage bei Janira Care');
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
        // send admin-triggered emails to the client
        $email = $client->email;
        $name = $request->input('name', $client->first_name . ' ' . $client->last_name);

        try {
            $german = "Guten Tag {$name},\n\n" .
                "Ihre Anfrage wurde von der Administration angenommen.\n\n" .
                "Details:\n" .
                "Leistungen: {$client->services}\n" .
                "Kanton: {$client->canton}\n" .
                "Stunden: {$client->hours}\n" .
                "Gesamtpreis: {$client->total_price} CHF\n\n" .
                "Für weitere Fragen erreichen Sie uns unter:\n" .
                "📞 Telefon: +41 71 422 77 77\n" .
                "📧 E-Mail: info@janiracare.ch\n\n" .
                "Vielen Dank!\n\n" .
                "Freundliche Grüße,\nJanira Care";

            \Mail::raw($german, function($message) use ($email) {
                $message->to($email)
                    ->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Ihre Anfrage wurde bestätigt');
            });
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