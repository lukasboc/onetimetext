<?php

namespace App\Http\Controllers\Secret;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSecretTextRequest;
use App\Models\Text;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TextController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secrets = Text::paginate(10);
        return view('secret.index', ['secrets' => $secrets]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        {
            return view('secret.show', [
                'secret' => Text::where('key', '=', $id)->firstOrFail()
            ]);
        }
    }

    public function store(StoreSecretTextRequest $request)
    {

        $userID = 1;

        if($request->user() !== null){
            $userID = $request->user()->id;
        }

        $randomString = Str::random(15);
        $request->request->add(['key' => $randomString]);
        $request->request->add(['user_id' => $userID]);

        $validated = $request->validate([
            // value is checked in StoreSecretTextRequest.php.
            // key must be checked here because its created in store method
            'key' => 'required|unique:texts|min:5|max:255'
        ]);

        $text = new Text;
        $text->key = $request->key;
        $text->value = $request->value;
        $text->user_id = $request->user_id;
        $text->save();



        if(!$text->save()){
            $request->session()->flash('error', 'The text was not created.');
            return redirect(url('/'));
        }
        $request->session()->flash('secreturl', url('/') .'/secret/' . $text->key);
        return redirect($request->header('Referer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($key)
    {
        $secret = Text::where('key', '=', $key)->firstOrFail();
        $deletedRow = Text::where('key', $key)->delete();

        return view('secret.delete', [
            'secret' => $secret
        ]);
    }

    public function delete (Request $request){
        $key = $request->input('key');
        $secret = Text::where('key', '=', $key)->firstOrFail();
        Text::where('key', $key)->delete();
        return redirect($request->header('Referer'));
    }
}
