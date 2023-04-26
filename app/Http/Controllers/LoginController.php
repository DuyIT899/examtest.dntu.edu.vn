<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\UserImport;
use App\Models\QLDT\User;
use App\Models\Quiz\User as UserQuiz;
use App\Models\Quiz\CauHoi;
use App\Models\Quiz\BaiThi;
use App\Models\Quiz\DapAn;
use App\Models\Quiz\DeThi;
use App\Models\Quiz\ChiTietBaiThi;

class LoginController extends Controller
{
    public function import(Request $request){
        $rows = (new UserImport)->toArray($request->file('file'))[0];
        $count = count($rows);
        $count;
        
        foreach ($rows as $item){
        CauHoi::create([
            'cauhoi' => $item['question'],
            'idMon' => $item['subject'],
            'boDe' => $item['topic'],
            'stt' => $item['stt']
            ]);
             $idCauHoi = CauHoi::where('cauhoi', $item['question'])
             ->where('stt', $item['stt'])->first()->IdCauHoi;
            for($i=1;$i<5;$i++){
                DapAn::create([
                    'idCauHoi' => $idCauHoi,
                    'DapAn' => $item['answer'.''.$i],
                    'isTrue' => $item['correct'.''.$i]
                ]);
             }}
             return back();
        }
    public function header(){
        $name = $request->session()->get('name');
        return view('layouts.header',compact('name'));
    }

    public function loginPage(){
        // phpinfo();
        return view('pages.login');
    }
    public function postLogin(Request $request){
        echo $username =  $request->username;
        echo $password =  $request->password;
        $user = User:: where ([
            ['Username', $username],
            ['Password', md5($password)]
        ])->select(['Username','Lastname','Firstname','Email','Phone'])->First() ?? Null;
        if($user){
            $DATAUser = UserQuiz::firstOrCreate(
                                                        [ 
                                                            'UserName' => $user->Username,
                                                            'FullName' => $user->Lastname . ' ' . $user->Firstname
                                                        ]
            );
            Alert::success('Thành công','đăng nhập thành công');
            $id = $user->Username;
            $name = $user->Lastname . ' ' . $user->Firstname;
            $admin = UserQuiz::where('UserName',$id)->first('IsAdmin');
            $request->session()->put('role',$admin);
            $request->session()->put('userName',$id);
            $request->session()->put('name',$name);
            $value = $request->session()->get('role')->IsAdmin;

            BaiThi::Create(
                [
                    'UserId' => $id,
                    'Diem' => 0,
                ]
                );

            return redirect('edit');
        }
        else {
            Alert::error('Thất bại','tên đăng nhập hoặc mật khẩu không đúng');
            return redirect('/');
        }
    }

    public function show(Request $request){

        if (!($idMon = $request->session()->get('idMon'))){
            $idMon = 1;
        };
        $name = session()->get('name');
        $mssv = session()->get('userName');
        $idCauHoi = CauHoi::where('idMon',$idMon)->first()->IdCauHoi;
        $listQuestion = CauHoi::where(
            'idMon',$idMon
        )->select('IdCauHoi')->first()->IdCauHoi;
        $request->session()->put('idCauHoi',$listQuestion);
        $userId = $request->session()->get('userName');
        $idBaiThi = BaiThi::where('UserId',$userId)
        ->orderBy('idBaiThi','desc')->first('idBaiThi')->idBaiThi;
        $request->session()->put('idBaiThi',$idBaiThi);
        $boDe = CauHoi::get('boDe')->max('boDe');
        $baiThi = BaiThi::where('UserId',$mssv)->get('Diem');
        $countScore = $baiThi->count();
        $maxScore = $baiThi->max()->Diem;
        $minScore = $baiThi->min()->Diem;
        
        return view('pages.edit',compact('countScore','maxScore','minScore',
                                        'name','mssv','idCauHoi','idMon','idBaiThi'));
    }

    public function getvalue(Request $request){
        $idMon = $request->check1;
        $request->session()->put('idMon',$idMon);
        return redirect('topic');
    }
    public function topic(Request $request){
        $idMon= $request->session()->get('idMon');
        $name = session()->get('name');
        $boDe = CauHoi::where('idMon',$idMon)->distinct()->orderBy('boDe')->get('boDe');
        return view('pages.topic',compact('boDe','name','idMon'));
    }
    public function getTopic(Request $request){
        $idMon= $request->session()->get('idMon');
        $userName = $request->session()->get('userName');
        $idBaiThi = $request->session()->get('idBaiThi');
        $topic = $request->getTopic;
        $role = $request->session()->get('role');
        $idCauHoi = CauHoi::where('idMon',$idMon)
        ->where('boDe',$topic)->orderby('IdCauHoi')
        ->first()->IdCauHoi;
        $request->session()->put('topic',$topic);
        $idMon = $request->session()->get('idMon');
        $baiThi = BaiThi::where('danhMuc',$idMon)
        ->where('boDe',$topic)->where('UserID',$userName)
        ->get('Diem');
        $maxScore = $baiThi->max();
        if (!($maxScore)){
            $maxScore = 0;
        }
        else($maxScore = $maxScore->Diem);
        $count = $baiThi->count();
        $ScoreFake = BaiThi::where('danhMuc',$idMon)->where('UserID',$userName)
        ->where('boDe',--$topic)->get('Diem');
        $maxScoreFake = $ScoreFake->max();
        $request->session()->put('maxScore',$maxScore);
        $request->session()->put('count',$count);
        $topic = ++$topic;
        $total = CauHoi::join('DapAn','DapAn.IdCauHoi','=','CauHoi.IdCauHoi')
                ->select('CauHoi.IdCauHoi','CauHoi.stt','DapAn.idDapAn','DapAn.isTrue')
                ->where('boDe',$topic)->where('idMon',$idMon)->distinct()
                ->get();

        foreach($total as $item){
            ChiTietBaiThi::firstOrCreate([
                'IdBaiThi' => $idBaiThi,
                'IdCauHoi' => $item->IdCauHoi,
                'IdDapAn' => $item->idDapAn,
                'IsTrue' => $item->isTrue,
                'sttCauHoi' => $item->stt,
            ]);
        }
        
        if(!($maxScoreFake)){
            $maxScoreFake = $maxScore;
        }
        else($maxScoreFake = $maxScoreFake->Diem);
        $request->session()->put('maxScoreFake',$maxScoreFake);
        if($topic > 1 and $role->IsAdmin != 1){
            if($maxScoreFake >= 7 ){
                return view('pages.infor',compact('idCauHoi','topic','maxScore','count','maxScoreFake'));
            }
            else{
                Alert::error('Thất bại','Bạn phải hoàn thành 70% đề ôn'.' '.--$topic.' '.'trước');
                return redirect('topic');
            };
        }
        else{
            return view('pages.infor',compact('idCauHoi','topic','maxScore','count','maxScoreFake'));
        }
    }

    public function examPage($id,Request $request){
        $maxScore = $request->session()->get('maxScore');
        $boDe = $request->session()->get('topic');
        $topic = $request->session()->get('topic');
        $idBaiThi = $request->session()->get('idBaiThi');
        $idMon = $request->session()->get('idMon');
        $request->session()->put('boDe',$boDe);
        $count = $request->session()->get('count');

        $listQuestion = CauHoi::where('idMon',$idMon)
        ->where('boDe',$boDe)
        ->where('IdCauHoi',$id)->orderBy('IdCauHoi')
        ->select('CauHoi','IdCauHoi','idMon','boDe')->first();
        $listAnswer = DapAn::where('idCauHoi',$id)->select('DapAn','idCauHoi','isTrue','idDapAn')->get();
        
        $next = CauHoi::where('idMon',$idMon)
        ->where('boDe',$boDe)
        ->where( 'IdCauHoi','>',$listQuestion->IdCauHoi)
        ->min('IdCauHoi');
        $previous = CauHoi::where('idCauHoi','<',$listQuestion->IdCauHoi)
        ->where('idMon',$idMon)
        ->where('boDe',$boDe)
        ->max('IdCauHoi');

        $request->session()->put('next',$next);
        $request->session()->put('previous',$previous);
        $request->session()->put('id',$id);

        $idDapAn = DapAn::where('idCauHoi',$id)->select('idDapAn','isTrue')->get();
        $checkAgain = ChiTietBaiThi::where('idCauHoi',$id)
        ->where('IdBaiThi',$idBaiThi)->where('IsCheck',1)->first()->IdDapAn ?? null;
        $test = ChiTietBaiThi::where('IdBaiThi',$idBaiThi)->distinct()
        ->select('IdCauHoi','IsCheck','sttCauHoi')
        ->get();
        
        BaiThi::where('idBaiThi',$idBaiThi)->
        update([
            'danhMuc' => $idMon,
            'boDe' => $boDe,
        ]);
        $tempArray = array();
        // foreach ($test as $key => $item) {
        //     if(!in_array($item->sttCauHoi, $tempArray) && ($item->IsCheck == 1 
        //     || $item->IsCheck == null || $item->IsCheck == 0 )){
        //         array_push($tempArray, $item->sttCauHoi);
        
        //         echo '(';
        //         echo $item->sttCauHoi;
        //         echo '-';
        //         echo $item->IsCheck;
        //         echo ')';
        //     }
        // }
        return view('pages.exam',compact('maxScore','count','checkAgain','listQuestion',
        'listAnswer','next','previous','idBaiThi','topic','test','tempArray'));
    }
    public function postCheck(Request $request){
        
         if(!($idCheck = $request->tFA)){
            $idCheck = [0];
         }

        $request->session()->put('idCheck',$idCheck);
        $idBaiThi = $request->session()->get('idBaiThi');
        $id= $request->session()->get('id');
        $next = $request->session()->get('next');
        $previous = $request->session()->get('previous');
        $idDapAn = DapAn::where('idCauHoi',$id)->select('idDapAn','isTrue')->get();
        foreach($idDapAn as $value){
            ChiTietBaiThi::where('IdBaiThi',$idBaiThi)
            ->where('IdCauhoi',$id)
            ->update([
                'IsCheck' => 0
            ]);
        }
        ChiTietBaiThi::where('IdDapAn',implode($idCheck))->where('IdBaiThi',$idBaiThi)
            ->update([
                'IsCheck' => 1
            ]);  
        if(!$next){
            return redirect('results');
        }
        else {
            return redirect()->route('exam',[$next]);
        }
    }

    public function results(Request $request){
        $boDe = $request->session()->get('topic');
         $idBaiThi = $request->session()->get('idBaiThi');
        $id = $request->session()->get('userName');
        $name = $request->session()->get('name');
        $idMon = $request->session()->get('idMon');
        $numberQuestion = CauHoi::where('idMon',$idMon)->where('bode',$boDe)->count();
          $score = ChiTietBaiThi::where("IdBaiThi",$idBaiThi)
        ->where('IsCheck','=', 1)->where('IsTrue','=','1')
        ->whereColumn('IsCheck','=','IsTrue')->count();
        $diem = ($score / $numberQuestion * 10);
         

        BaiThi::where('idBaiThi',$idBaiThi)
        ->update([
            'Diem' => $diem
        ]);

         $idQuestion = ChiTietBaiThi::where('IdBaiThi',$idBaiThi)->distinct()->get();
         $listQuestion = CauHoi::where('idMon',$idMon)
        ->where('boDe',$boDe)->orderBy('IdCauHoi')
        ->select('CauHoi','IdCauHoi','idMon','boDe')->get();

         $wrongQ = CauHoi::join('ChiTietBaiThi','ChiTietBaiThi.IdCauHoi','=','CauHoi.IdCauHoi')
        ->select('CauHoi.IdCauHoi','CauHoi.cauhoi')->where('ChiTietBaiThi.IdBaiThi',$idBaiThi)
        ->where('IsCheck','=', 1)->where('IsTrue','=','0')
        ->orderby('CauHoi.IdCauHoi')->distinct()->get();

        return view('pages.results',compact('diem','numberQuestion','name','listQuestion','wrongQ'));
    }
    public function postReWork(Request $request){
        $id = $request->session()->get('userName');
        BaiThi::Create(
                [
                    'UserId' => $id,
                    'Diem' => 0,
                ]
                );
        return redirect('edit');
    }

    public function Logout(Request $request){
        $request->session()->forget('adminValue');
        $request->session()->forget('userName');
        $request->session()->forget('name');
        $request->session()->forget('value');
        $request->session()->forget('user');
        $request->session()->forget('nameSearch');
        $request->session()->forget('topic');
        $request->session()->forget('maxScore');
        $request->session()->forget('count');
        return redirect('/');

    }
    public function session(Request $request){

    }

    public function uploadimage(Request $request){
        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName'=>$fileName, 'uploaded'=>1, 'url'=>$url]);
        }
    }
    public function editQuestion($id,Request $request){
        $cauHoi = CauHoi::where('IDCauHoi',$id)->first();
        $dapAn = DapAn::where('idCauHoi',$id)->select('DapAn','idCauHoi','idDapAn','isTrue')->get();
        return view('livewire.edit',compact('cauHoi','dapAn'));
    }

    public function deleteQuestion($id,Request $request){
        CauHoi::where('idCauHoi',$id)->delete();
        DapAn::where('idCauHoi',$id)->delete();
        return redirect('question');
    }

    public function addQuestion(Request $request){
        $question = $request->question;
        $idMon = $request->selectAdd;
        $stt = $request->stt;
        $answer1 = $request->answer1;
        $answer2 = $request->answer2;
        $answer3 = $request->answer3;
        $answer4 = $request->answer4;
        $De = $request->boDe;
        $arrayToString1 = implode($request->input('tF1'));
        $arrayToString2 = implode($request->input('tF2'));
        $arrayToString3 = implode($request->input('tF3'));
        $arrayToString4 = implode($request->input('tF4')); 
        CauHoi::Create(
            [
                'idMon' => $idMon,
                'cauhoi' => $question,
                'boDe' => $De,
                'stt' => $stt,
            ]
            );
            $idCauHoi = CauHoi::where('cauhoi',$question)->where('stt',$stt)->first()->IdCauHoi;
        DapAn::Create(
            [
                'idCauHoi' => $idCauHoi,
                'DapAn' => $request->answer1,
                'isTrue' => $arrayToString1
            ]);
        DapAn::Create(
             [
                'idCauHoi' => $idCauHoi,
                'DapAn' => $request->answer2,
                'isTrue' => $arrayToString2,

            ]);
        DapAn::Create(
            [
               'idCauHoi' => $idCauHoi,
               'DapAn' => $request->answer3,
               'isTrue' => $arrayToString3,
            ]);
        DapAn::Create(
            [
               'idCauHoi' => $idCauHoi,
               'DapAn' => $request->answer4,
               'isTrue' => $arrayToString4,
            ]);

            return redirect('/question')->with('flash_message','đã tạo thành công câu hỏi');
    }

    public function updateQuestion(Request $request){
        $question = $request->questionE;
        $idQuestion = $request->idQuestionE;
        $idMon = $request->selectAddE;
        $answer1 = $request->answer1E;
        $answer2 = $request->answer2E;
        $answer3 = $request->answer3E;
        $answer4 = $request->answer4E;
        $idAnswer1 = $request->idAnswer1E;
        $idAnswer2 = $request->idAnswer2E;
        $idAnswer3 = $request->idAnswer3E;
        $idAnswer4 = $request->idAnswer4E;
        $De = $request->boDeE;
        $arrayToString1 = implode($request->input('tF1E'));
        $arrayToString2 = implode($request->input('tF2E'));
        $arrayToString3 = implode($request->input('tF3E'));
        $arrayToString4 = implode($request->input('tF4E'));
        CauHoi::where('idCauHoi',$idQuestion)->update(
            [
                'idMon' => $idMon,
                'cauhoi' => $question,
                'boDe' => $De,
            ]
            );
        DapAn::where('idDapAn',$idAnswer1)->update (
            [
                'DapAn' => $answer1,
                'isTrue' => $arrayToString1
            ]);
         DapAn::where('idDapAn',$idAnswer2)->update (
            [
                'DapAn' => $answer2,
                'isTrue' => $arrayToString2
            ]);
        DapAn::where('idDapAn',$idAnswer3)->update (
            [
                'DapAn' => $answer3,
                'isTrue' => $arrayToString3
            ]);
        DapAn::where('idDapAn',$idAnswer4)->update (
            [
                'DapAn' => $answer4,
                'isTrue' => $arrayToString4
            ]);
            return redirect('/question');
    }
    public function postSearch(Request $request){
        $search = $request->search;
        $request->session()->put(
            'user', $user = BaiThi::where(
                'UserID', $search)
                ->orderBy('idBaiThi','desc')
                ->get()); 
        $request->session()->put(
            'nameSearch', $name = 
            UserQuiz::where('UserName', $search)
            ->first()); 
        return redirect('admin');
    }

    public function admin(Request $request){
        $user = $request->session()->get('user');
        $name = $request->session()->get('nameSearch');
        return view('pages.admin',compact('user','name'));
    }
}
