<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\User\EditRequest;


/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    use UploadImage;
    public function __construct(){
        $this->middleware('admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->user_type_id == 1){
            $users = User::paginate();
            return view('user.index', compact('users'))
                ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User();
        if($request->has('avatar')&&$request->has('signature_professional')){
            $file_avatar =$request->file('avatar');
            $file_signature =$request->file('signature_professional');
            if(!$this->uploadAvatar($file_avatar,rand())||!$this->uploadSignature( $file_signature,rand())){
                $request->session()->flash('file_error', $this->error_message);
                return redirect()->route('usuarios.index')->withInput();
            }
            $img_avatar=$this->new_name_avatar;
            $img_signature_professional=$this->new_name_signature;
        }
        request()->validate(User::rules());
        $user->fill($request->all());
        $user->avatar=$img_avatar;
        $user->signature_professional=$img_signature_professional;
        $user->password=Hash::make($request->password);
        $user->save();

        return redirect()->route('usuarios.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, User $user, $id)
    {
        $user = User::find($id);

        if(is_null($user)){
            return redirect()->route('usuarios.index');
        }

        if($request->has('avatar')){
            $file_avatar =$request->file('avatar');
            $new_name_avatar = uniqid(rand(), true).'.'.strtolower($file_avatar->getClientOriginalExtension());
            $result_avatar =Storage::disk('public')->put('avatars/'.$new_name_avatar,File::get($file_avatar));//almacenar en el disco
                if(!$result_avatar){
                    $request->session()->flash('message','Ocurrio un error al cargar la imagen');
                    return redirect()->route('tecnicos.edit',[$user]->with('user',$user));
                }
                if(Storage::disk('public')->exists('avatars/'.$user->avatar)){
                    Storage::disk('public')->delete('avatars/'.$user->avatar);
                }
                $user->avatar=$new_name_avatar;
        }
        if($request->has('signature_professional')){
            $file_signature =$request->file('signature_professional');
            $new_name_signature = uniqid(rand(), true).'.'.strtolower($file_signature->getClientOriginalExtension());
            $result_signature =Storage::disk('public')->put('signatures/'.$new_name_signature,File::get($file_signature));//almacenar en el disco
                if(!$result_signature){
                    $request->session()->flash('message','Ocurrio un error al cargar la imagen');
                    return redirect()->route('usuarios.index',[$user]->with('user',$user));
                }
                if(Storage::disk('public')->exists('signatures/'.$user->signature_professional)){
                    Storage::disk('public')->delete('signatures/'.$user->signature_professional);
                }
                $user->signature_professional=$new_name_signature;
        }

        $data = $request->all();

        $user->fill($data);
        if($request->password == null){
             $user = Arr::except($user,'password');
         }

        $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->route('usuarios.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function destroy(Request $request, $id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('usuarios.index')
        ->with('success', 'User deleted successfully');
    }


    public function getSelectUser (Request $request, $id)
    {
        if($request->ajax()){
            $user=User::find($id);
            return response()->json($user);
        }
    }


}
