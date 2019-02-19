<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Hash;
use View;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use App\User;

	class UserController extends Controller
	{

		public function index()
		{
			if(Auth::check())
				return View::make('home');
			else
				return View::make('auth.login');
		}

		// public function login()
		// {
		// 	if (Auth::attempt(Input::all()))
		// 	{
		// 	    return Redirect::to(route('product.index'));
		// 	}
		// 	else
		// 		return Redirect::to('/')->with('status','fail');
		// }

		public function logout()
		{
			Auth::logout();
		    Session::flush();
		    return Redirect::to('/');
		}

		public function resetPassword()
		{
			return View::make('auth.resetPassword');
		}

		public function updatePassword()
		{
			$actual = Input::get('actual');
			$nueva = Input::get('nueva');
			$nueva1 = Input::get('nueva1');

			$v = $this->validaPassword(Input::all()); 
			if($v->passes())
			{
				//$actualEncriptada = Hash::make($actual);
				if(Hash::check($actual, Auth::user()->password))
				{
					//Contraseña actual coincide
					$user_id = Auth::User()->id;                       
			        $obj_user = User::find($user_id);
			        $obj_user->password = Hash::make($nueva);;
			        $obj_user->save(); 

					//Cerramos Sesión en caso se actualice correctamente
					Auth::logout();
				    Session::flush();
				    return Redirect::to('/');				
				}
				else
				{
					//Contraseña actual NO coincide
					return View::make('auth.resetPassword')->withErrors(['message'=>'La contraseña actual no es correcta.']);
				}
			}
			else
			{
				return View::make('auth.resetPassword')->withErrors($v);
			}

		}

		public function validaPassword($request)
		{
			$rules = [
		        'actual'	=>  'required',
		        'nueva'		=>  'required|min:8|regex:/^(?=\S*[a-z])(?=\S*[A-Z])\S*$/',
		        'nueva1'	=>  'required|same:nueva',
		    ];

		    $messages = [
		        'actual.required'		=> 'Debe ingresar la contraseña actual.',
		        'nueva.required'		=> 'La Contraseña Nueva no puede estar en blanco.',
		        'nueva.min'				=> 'La Contraseña Nueva debe tener al menos 8 caracteres.',
		        'nueva.regex'			=> 'La Contraseña Nueva debe contener letras mayúsculas y minúsculas.',
		        'nueva1.required'		=> 'La verificación de Contraseña Nueva no puede estar en blanco.',
		        'nueva1.same'			=> 'La verificación de Contrseña Nueva no coincide.',
		    ];

		    return Validator::make($request,$rules,$messages);
		}

		// public function register()
		// {
		//     return View::make('auth.register');
		// }
		
		// public function Listar()
		// {
		// 	$users = User::all();
		// 	return View::make('user.listar')->with('users',$users);
		// }

		// public function Edit($id)
		// {
		// 	$user = User::find($id);
		// 	return View::make('user.edit')->with('user',$user);
		// }

		// public function Update($id)
		// {
		// 	$user = User::find($id);
		// 	$pass = Input::get('passoriginal');
		// 	$pass1 = Input::get('password1');
		// 	$pass2 = Input::get('password2');

		// 	if( Hash::check($pass,$user->password) )
		// 	{
		// 		if($pass1 == $pass2)
		// 		{

		// 			$v = User::validate(Input::all());
		// 			if($v->passes())
		// 			{
		// 				$new = Hash::make($pass1);
		// 				$user->password = $new;
		// 				$user->save();
		// 				return Redirect::to(route('user.listar'))->with('status','ok_update');
		// 			}
		// 			return Redirect::to(route('user.edit',$user->id))->withInput()->withErrors($v);

		// 		}
		// 		return Redirect::to(route('user.edit',$user->id))->with('status','diferente');
		// 	}
			
		// 	return Redirect::to(route('user.edit',$user->id))->with('status','incorrecto');
		// }
	}
