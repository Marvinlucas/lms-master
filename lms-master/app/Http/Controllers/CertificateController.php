<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Term;
use Illuminate\Http\Request;
use PDF;
use Auth; // Import the Auth facade
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function generateCertificate($termId)
{
    // Fetch the term_user record for the specified termId and authenticated user
    $termUser = DB::table('term_user')
        ->where('user_id', Auth::id())
        ->first();


    // Fetch the certificate data, including the logo URL
    $certificate = Certificate::first();

    // Get the authenticated user's name
    $userName = Auth::user()->name;
    $userLastName = Auth::user()->last_name;
    $userMiddleInitial = Auth::user()->middle_initial;

    // Access the attributes directly from the result of the query
    $term_title = $termUser->term_title; // Replace with the actual column name
    $course_title = $termUser->course_title; // Replace with the actual column name
    $finishDate = $termUser->finish_date; // Replace with the actual column name

    // Prepare data for the certificate template
    $data = [
        'username' => $userName,
        'userlastname' => $userLastName,
        'usermiddleinitial' => $userMiddleInitial,
        'course' => $course_title,
        'term' => $term_title,
        'date' => $finishDate,
        'logo' => base64_encode(file_get_contents(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'logo' . DIRECTORY_SEPARATOR . basename($certificate->logo)))),
        'position_1' => $certificate->position_1,
        'position_2' => $certificate->position_2,
        'name_1' => $certificate->name_1,
        'name_2' => $certificate->name_2,
        'signature_1' => base64_encode(file_get_contents(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'signatures1' . DIRECTORY_SEPARATOR . basename($certificate->signature_1)))),
        'signature_2' => base64_encode(file_get_contents(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'signatures2' . DIRECTORY_SEPARATOR . basename($certificate->signature_2)))),
        'background' => base64_encode(file_get_contents(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'background' . DIRECTORY_SEPARATOR . basename($certificate->background)))),
    ];

    // Load the certificate template HTML
    $html = view('certificate.certificate', $data)->render();

    // Generate the PDF from the HTML
    $pdf = PDF::loadHTML($html);

    // Set the paper size to certificate size (e.g., A4) and landscape orientation
    $pdf->setPaper('Letter', 'landscape');

    // Set the file name for the PDF
    $fileName = 'certificate_' . $termId . '_' . Auth::id() . '.pdf';

    // Optionally, you can store the PDF on the server or force download
    // Example: $pdf->save(storage_path('certificates/' . $fileName));
    // Example: return $pdf->download($fileName);

    // Display the PDF in the browser
    return $pdf->stream($fileName);
}

    
    // Method to handle the form submission
    public function index()
    {
        $certificate = Certificate::first(); // Retrieve a single certificate
        return view('contents.admin.badges.index', compact('certificate'));
    }
}
