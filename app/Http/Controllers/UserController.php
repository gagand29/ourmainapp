<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{   



    public function storeAvatar(Request $request){
        $request->file('avatar')->store('public/avatars');
        $request->validate([

            'avatar' => 'required|image|max: 3000 '
        ]);

        $user = auth()->user();
        $filename = $user->id . "-" .  uniqid() . ".jpg";

        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file("avatar"));
        $imgData = $image->cover(120,120)->toJpeg();
        Storage::put("public/avatars/" . $filename ,$imgData);

        $oldAvatar=$user->avatar;

        $user->avatar = $filename;
        $user->save();

        if($oldAvatar != "/fallback-avatar.jpg"){
            storage::delete(str_replace("/storage/","public/", $oldAvatar));

        }

        return back()->with('success','congrats on new avatar');
        
    }


    public function showAvatarform(){
        return view('avatar-form');
    }

    Private function getsharedData($user){

        $currentlyFollowing = 0;

        if(auth()->check()) {

            $currentlyFollowing = Follow::where([['user_id','=',auth()->user()->id],['followeduser','=',$user->id]])->count();

        }

        View::share('sharedData',[
            'currentlyFollowing' => $currentlyFollowing,
            'avatar' => $user->avatar,
            'username' => $user->username,
            'postCount' => $user->posts()->count(),
            'followerCount' => $user->followers()->count(),
            'followingCount' => $user->followingTheseUsers()->count()
        ]);

    }



    public function profile(User $user) {

        $this->getSharedData($user);
        return view('profile-posts', [
            'posts' => $user->posts()->latest()->get()
        ]);


    }


    public function profileFollowers(User $user) {
        //$currentlyFollowing = Follow::where();
        $this->getSharedData($user);

        return view('profile-followers', [
            'followers' => $user->followers()->latest()->get()
        ]);
    }


    public function profileFollowing(User $user) {

        $this->getSharedData($user);
        //$currentlyFollowing = Follow::where();


        return view('profile-following', [
            'following' => $user->followingTheseUsers()->latest()->get()
        ]);


    }



    public function logout() {
        auth()->logout();
        return redirect('/')->with('success', 'Successfully logged out');
    }

    public function showCorrectHomepage() {
        if (auth()->check()) {
            return view('homepage-feed');
        } else {
            return view('homepage');
        }
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required',
        ]);

        if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();    
            return redirect('/')->with('success', 'You have successfully logged in');
        } else {
            return redirect('/')->with('failure', 'Invalid login');
        }
    }

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')], 
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $user = User::create([
            'username' => $incomingFields['username'],
            'email' => $incomingFields['email'],
            'password' => bcrypt($incomingFields['password'])
        ]);

        auth()->login($user);

        return redirect('/')->with('success', 'Thank you for registering');
    }
}
