<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileResource;
use App\Http\Resources\ProfileResourceCollection;
use App\User;
use App\UserRole;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    private $userRepository;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = app(UserRepository::class);
    }

    /**
     * @return mixed
     */
    public function index()
    {
        //return response()->json(User::all());
        $user = Auth::user();
        return new ProfileResource($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = $this->userRepository->getProfileInfo($id);
        //return response()->json($user, 200);
        return new ProfileResource($user);
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


}
