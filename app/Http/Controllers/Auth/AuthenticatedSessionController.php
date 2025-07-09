<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Filament\Facades\Filament;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        

        $request->authenticate();
    $request->session()->regenerate();

    /** @var \App\Models\User $user */
    $user = Auth::user();

    $validRoles = ['siswa', 'guru', 'staf'];
    if (!in_array($user->role, $validRoles)) {
        Auth::logout();
        return redirect('/login')->withErrors(['email' => 'Role tidak dikenali.']);
    }

    $url = '';

        switch ($user->role) {
            case 'staf':
                $url = Filament::getPanel('admin')->getUrl();
                break;
            case 'guru':
                $url = Filament::getPanel('guru')->getUrl();
                break;
            case 'siswa':
                
                $url = Filament::getPanel('siswa')->getUrl();
                break;
            default:
                
                $url = Filament::getPanel('admin')->getUrl();
                break;
        }

       return redirect($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}