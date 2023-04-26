<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Quiz\CauHoi;
use App\Models\Quiz\DapAn;

class QuestionComponent extends Component
{
    public $question,$IDMon,$answer1,$answer2,$answer3,$answer4,$count = 1;

        public function decrement(){
            $this->count--;
        }
        public function increment(){
            $this->count++;
        }
        public function tang(){
            if(value=='true'){
                $this->count++;
            }
        }

        public function editQuestion(){
            return view('livewire.edit',)
                ->layout('livewire.layout.base');
        }
  
    public function render()
    {
            $listQuestion = CauHoi::select('CauHoi','boDe','IdCauHoi','idMon','stt')
            ->orderBy('IdCauHoi')->paginate(200);
            $listAnswer = DapAn::select('DapAn','idCauHoi','idDapAn','isTrue')->get();
            return view('livewire.question-component',compact('listQuestion','listAnswer'))
                    ->layout('livewire.layout.base');
        }
}
