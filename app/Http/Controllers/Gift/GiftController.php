<?php

namespace App\Http\Controllers\Gift;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class GiftController extends Controller
{
    /**
     * Display the registration view.
     */
    public function registerCreate(): View
    {
        return view('gift.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function registerStore(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'male_name' => ['required', 'string', 'max:255'],
            'female_name' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'male_name' => $request->male_name,
            'female_name' => $request->female_name,
            'type' => 'gift',
        ]);

        //event(new Registered($user));

        Auth::login($user);

        return redirect(route('gift.dashboard', absolute: false));
    }

    public function loginCreate(): View
    {
        return view('gift.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function loginStore(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('gift.dashboard', absolute: false));
    }

    public function index(): View
    {
        $alphabet = ['A', 'B', 'C', 'Ç', 'D', 'E', 'F', 'G', 'Ğ', 'H', 'I', 'İ', 'J', 'K', 'L', 'M', 'N', 'O', 'Ö', 'P', 'R', 'S', 'Ş', 'T', 'U', 'Ü', 'V', 'Y', 'Z'];

        // Kullanıcının gönderdiği harfleri al
        $usedLetters = auth()->user()->gifts()->pluck('letter')->toArray();

        // Rastgele bir harf seç (sadece kullanılmayan harflerden)
        $availableLetters = array_diff($alphabet, $usedLetters);
        $randomLetter = $availableLetters ? $availableLetters[array_rand($availableLetters)] : null;

        $gifts = auth()->user()->gifts()->paginate(20);

        return view('gift.dashboard', [
            'randomLetter' => $randomLetter,
            'alphabet' => $alphabet,
            'usedLetters' => $usedLetters,
            'gifts' => $gifts,
        ]);
    }


    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'letter' => 'required|string|size:1',
                'male_gift_name' => 'required|string|max:255',
                'male_gift_image' => 'required|image|max:2048',
                'female_gift_name' => 'required|string|max:255',
                'female_gift_image' => 'required|image|max:2048',
            ], [
                'male_gift_image.max' => 'Erkek hediyesi görseli en fazla 2 MB olabilir.',
                'female_gift_image.max' => 'Kadın hediyesi görseli en fazla 2 MB olabilir.',
            ]);


            $maleImagePath = $request->file('male_gift_image')->store('gifts', 'public');
            auth()->user()->gifts()->create([
                'letter' => $request->letter,
                'name' => $request->male_gift_name,
                'image' => $maleImagePath,
                'partner' => 'male',
            ]);

            $femaleImagePath = $request->file('female_gift_image')->store('gifts', 'public');
            auth()->user()->gifts()->create([
                'letter' => $request->letter,
                'name' => $request->female_gift_name,
                'image' => $femaleImagePath,
                'partner' => 'female',
            ]);

            return redirect()->route('gift.dashboard')->with('success', 'Hediyeler başarıyla gönderildi!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hediyeler kaydedilirken bir hata oluştu, lütfen tekrar deneyin ve görsel bıyutlarını kontrol edin.');
        }
    }

}
