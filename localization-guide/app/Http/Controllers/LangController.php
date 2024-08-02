<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App;
  
class LangController extends Controller
{
    
   
    public function index(): View
    {
        return view('lang');
    }
  
    
    public function change(Request $request): RedirectResponse
    {
        // Validate the incoming request
        $request->validate([
            'lang' => 'required|in:en,fr,sp', // Allow only 'en' or 'es'
        ]);

        // Set the application locale
        App::setLocale($request->lang);

        // Store the locale in the session
        session()->put('locale', $request->lang);

        // Redirect back to the previous page
        return redirect()->back();
    }
}
