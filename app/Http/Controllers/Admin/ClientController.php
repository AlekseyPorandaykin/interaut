<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use Illuminate\Support\Facades\Redirect;
use Session;
use Validator;

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
        if ($dataClient['data'] == "requisites"){
            $this->saveRequisitesClient($dataClient, $request->id);
        }
        elseif ($dataClient['data'] == "auth"){
            $result = $this->saveAuthClient($dataClient, $request->id);
            if (isset($result["errors"]) || isset($result["validator"])){
                Session::flash('client-message-error', "profile");
                if(isset($result['validator'])){
                    if ($result['validator']->fails()) {
                        return redirect()->back()
                            ->withErrors($result['validator'])
                            ->withInput();
                    }
                }
                if(isset($result["errors"])){
                    return redirect()->back()
                        ->withErrors($result['errors'])
                        ->withInput();
                }
            }
        }
        return redirect('/admin/clients');
    }

    /**
     * Сохраняем или изменяем реквизиты клиента
     * @param array $dataClient массив входных данных
     * @param  int $idClient Идентификатор клиента
     */
    public function saveRequisitesClient ($dataClient, $idClient){
        $insertData = [
            "name_legal_entity" => $dataClient["name_legal_entity"],
            "legal_address" => $dataClient["legal_address"],
            "actual_address" => $dataClient["actual_address"],
            "ogrn" => $dataClient["ogrn"],
            "inn" => $dataClient["inn"],
            "kpp" => $dataClient["kpp"],
            "okpo" => $dataClient["okpo"],
            "okved" => $dataClient["okved"],
            "payment_account" => $dataClient["payment_account"],
            "correspondent_account" => $dataClient["correspondent_account"],
            "bank" => $dataClient["bank"],
            "bik" => $dataClient["bik"],
            "general_director" => $dataClient["general_director"],
            "manager" => $dataClient["manager"],
            "phone" => $dataClient["phone"],
            "contract_number" => $dataClient["contract_number"],
            "date" => $dataClient["date"]
        ];
        if (isset($idClient)){
            Client::where('id', $dataClient["id"])->update($insertData);
            Session::flash('flash_message', 'Клиент '.$dataClient["name_legal_entity"]." был обновлён.");
        } else {
            Client::create($insertData);
            Session::flash('flash_message', 'Клиент '.$dataClient["name_legal_entity"]." был создан.");
        }
    }

    /**
     * Сохраняем или изменяем данные для авторизации клиента
     * @param array $dataClient массив входных данных
     * @param int $idClient Идентификатор клиента
     * @return array
     */
    public function saveAuthClient ($dataClient, $idClient){
        $return = [];
        $alert = [];
        $messages = [
            'min'    => ':attribute должен быть больше :min символов.'
        ];
        $validatorData = [];
        $insertData = [];
        if (!empty($dataClient["name"])){
            $alert['name'] = true;
            $insertData["name"] = $dataClient["name"];
            $validatorData["name"]= 'min:5';
            if (count(User::where('name', $dataClient["name"])->where('clients_id', '<>', $idClient)->get())){
                 $return['errors'] =  ["name" => "Такой логин уже используется."];
                 return $return;
            }
        }
        if (!empty($dataClient["email"])){
            $alert['email'] = true;
            $insertData["email"] = $dataClient["email"];
            $validatorData["email"]= 'email';
            if (count(User::where('email', $dataClient["email"])->where('clients_id', '<>', $idClient)->get())){
                $return['errors'] =  ["email" => "Такой email уже используется."];
                return $return;
            }
        }
        if (!empty($dataClient["password"])) {
            $alert['password'] = true;
            $insertData["password"] = bcrypt($dataClient["password"]);
            $validatorData["password"] = 'min:6';
        }
        $return['validator'] = Validator::make($dataClient, $validatorData, $messages);

        if (!$return['validator']->fails()) {
            if (count(User::where('clients_id', $idClient)->get())){
                User::where('clients_id', $idClient)->update($insertData);
            }
            else {
                if (empty($alert['name']) || empty($alert['email']) && empty($alert['password'] )){
                    Session::flash('flash_message', "Клиенту необходимо заполнить все поля во вкладке Профиль.");
                    $return["errors"] = ['other' => true];
                }
                else{
                    $insertData['clients_id'] = $idClient;
                    User::create($insertData);
                }
            }
        }
        return $return;
    }

    /**
     * Отобразить форму редактирования клиента
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit (Request $request){
        $data['client'] = Client::find($request->id);
        $dataUser = User::where('clients_id', $request->id)->get();
        if (count($dataUser)){
            $data['user'] = $dataUser[0];
        }
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
