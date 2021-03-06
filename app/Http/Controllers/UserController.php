<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

use App\Repositories\UserRepository;
use App\Http\Requests\StoreUser;

class UserController extends Controller
{
    
    protected $users;
    
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("edit", User::class);   
        
        $users = $this->users->all()->paginate(15);

        return view('users', [
            'users' => $users
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        //validator
        /*
        $message = [
            'email' => "Email has been taken by another registered user"
        ];*/
        $validated = $request->validated();

        //create
        $this->users->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);

        Session::flash('success', __('user.create_success'));

        return redirect("/users");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * toggle user's is_active status
     *
     * @param  App\User  $user
     * @param  string $status
     * @return \Illuminate\Http\Response
     */

    public function updateActiveStatus(User $user, $action)
    {
        try
        {
            $this->authorize("edit", User::class);
        }
        catch(\Exception $e)
        {
            abort('403', __('exception.userEditNotAllowed'));
        }
        
        $is_active = ($action == 'activate') ? 1 : 0;
        
        $user->is_active = $is_active;

        $user->save();

        Session::flash('success', __('user.update_successfully'));
        return redirect("/users");
    }
}
