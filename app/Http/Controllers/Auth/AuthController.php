<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Plan;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use Hash;
  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request){
	    $validated = $request->validated();
	   
	    $credentials = $request->only('email', 'password');
	    
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard'))
                ->withSuccess('You have Successfully loggedin');
    	}
    	return redirect("auth/login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration(RegistrationRequest $request)
    {
    	if ($request->isMethod('post')) {
    		$credentials = $request->only('email', 'password','name');

    		$validated = $request->validated();
    		
            $user = $this->create($validated);

            $plan = Plan::where('is_default','=', 1)->first();

            $user->plans()->sync([
                $plan->id => [
                    'available_limit' => $plan->url_limit,
                    'used_limit' => 0,
                    'is_active' => 1
                ]
            ]);

            Auth::login($user);
    		
    		return redirect()->route("dashboard")->withSuccess('Great! You have Successfully loggedin');
    	}
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => $data['password']
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Auth::logout();
  
        return Redirect('auth/login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function upgradePlan(Request $request)
    {
        
    }
}