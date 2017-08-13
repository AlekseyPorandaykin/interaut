<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use Illuminate\Support\Facades\Redirect;
use Session;

class ClientController extends Controller
{

    /**
     * Отобразить главную страницу клиента
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index (){
        $allClients = Client::all();
        return view('admin-pages.clients.index', ['allClients' => $allClients]);
    }

    /**
     * Отобразить форму создания клиента
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create (){
        return view('admin-pages.clients.create');
    }

    /**
     * Сохранить и изменить данные клиента
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save (Request $request){
        $dataClient = $request->all();
        unset($dataClient["_token"]);
        if (isset($request->id)){
            Client::where('id', $request->id)->update($dataClient);
            Session::flash('flash_message', 'Клиент '.$dataClient["name_legal_entity"]." был обновлён.");
        } else {
            Client::create($dataClient);
            Session::flash('flash_message', 'Клиент '.$dataClient["name_legal_entity"]." был создан.");
        }

        return redirect('/admin/clients');
    }

    /**
     * Отобразить форму редактирования клиента
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit (Request $request){
        $data = Client::find($request->id);
        return view('admin-pages.clients.edit', ['data' => $data]);
    }

    /**
     * Удалить клиента
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete (Request $request){
        $dataClient = Client::find($request->id);
        Client::where('id', $request->id)->delete();
        Session::flash('flash_message', 'Клиент '.$dataClient["name_legal_entity"]." удалён.");
        return redirect('/admin/clients');
    }

    public function tariff (Request $request){
        dd($request->id);
    }

}
