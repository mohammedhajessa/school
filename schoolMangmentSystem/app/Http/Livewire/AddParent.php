<?php

namespace App\Http\Livewire;

use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;

class AddParent extends Component
{
    public $successMessage = '';
    public $showPassword = false;
    public $catchError;

    public $currentStep = 1,
    $show_table=true,
    $Parent_id,
    $updateMode= false,

    // Father_INPUTS
        $Name_Father, $Name_Grand,
        $National_ID_Father,
        $Phone_Father, $Job_Father,
        $Nationality_Father, $Blood_Type_Father,$Email,$Password,

        // Mother_INPUTS
        $Name_Mother,
        $National_ID_Mother,
        $Phone_Mother,
        $Nationality_Mother, $Blood_Type_Mother;
        public function back($step)
        {
            $this->currentStep = $step;
        }

        public function showformadd(){
            $this->show_table = false;
        }

    // validate Only
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'National_ID_Father' => 'required|string|regex:/[0-9]{9}/',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'National_ID_Mother' => 'required|string|min:10|max:20|regex:/[0-9]{9}/',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Father' => 'required',
            'Email'=>'required|email|unique:my__parents,Email,'.$this->id,
            'Password'=>'required|min:8,'.$this->id,

        ]);
    }


    public function render()
    {
        return view('livewire.add-parent', [
            'my_parents' => My_Parent::all(),
        ]);

    }

    //firstStepSubmit
    public function firstStepSubmit()
    {
        $this->validate([
            'Name_Father' => 'required|string|max:255|',
            'Name_Grand' => 'required|string|max:255',
            'Phone_Father' => 'required|min:10',
            'Job_Father' => 'required|string|max:255',
            'National_ID_Father' => 'required|min:10|max:20|unique:my__parents,National_ID_Father,'.$this->id,
            'Nationality_Father' => 'required',
            'Email'=>'required|email|unique:my__parents,Email,'.$this->id,
            'Password'=>'required|min:8,'.$this->id,
        ],
    );

        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {
        $this->validate([
            'Name_Mother' => 'required',
            'National_ID_Mother' => 'required|min:10|max:20|unique:my__parents,National_ID_Mother,'.$this->id,
            'Phone_Mother' => 'required|min:10',
            'Nationality_Mother' => 'required',
        ]);

        $this->currentStep = 3;
    }

    public function submitForm(){

        try {
            $My_Parent = new My_Parent();
            // Father_INPUTS
            $My_Parent->Name_Father = $this->Name_Father;
            $My_Parent->Name_Grand = $this->Name_Grand;
            $My_Parent->National_ID_Father = $this->National_ID_Father;
            $My_Parent->Phone_Father = $this->Phone_Father;
            $My_Parent->Job_Father = $this->Job_Father;
            $My_Parent->Nationality_Father= $this->Nationality_Father;
            $My_Parent->Blood_Type_Father= $this->Blood_Type_Father;
            // Mother_INPUTS
            $My_Parent->Name_Mother = $this->Name_Mother;
            $My_Parent->National_ID_Mother = $this->National_ID_Mother;
            $My_Parent->Phone_Mother = $this->Phone_Mother;
            $My_Parent->Nationality_Mother = $this->Nationality_Mother;
            $My_Parent->Blood_Type_Mother = $this->Blood_Type_Mother;
            $My_Parent->Email=$this->Email;
            $My_Parent->Password=Hash::make($this->Password);
            $My_Parent->save();
            $this->successMessage = 'تم ادخال البيانات بنجاح ';
            $this->clearForm();
            $this->currentStep = 1;
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }

    //clearForm
    public function clearForm()
    {
        // Father
        $this->Name_Father = '';
        $this->Name_Grand = '';
        $this->Job_Father = '';
        $this->National_ID_Father ='';
        $this->Phone_Father = '';
        $this->Nationality_Father = '';
        $this->Blood_Type_Father = '';
        //Mother
        $this->Name_Mother = '';
        $this->National_ID_Mother ='';
        $this->Phone_Mother = '';
        $this->Nationality_Mother = '';
        $this->Blood_Type_Mother = '';
        $this->Email = '';
        $this->Password = '';
    }


    //back
    public function edit($id){
        $this->show_table = false;
        $this->updateMode=  true;
        try {
            // Father_Info
            $this->show_table = false;
            $this->updateMode = true;
            $My_Parent = My_Parent::where('id',$id)->first();
            $this->Parent_id = $id;
            $this->Name_Father = $My_Parent->Name_Father;
            $this->Name_Grand = $My_Parent->Name_Grand;
            $this->Job_Father = $My_Parent->Job_Father;
            $this->National_ID_Father =$My_Parent->National_ID_Father;
            $this->Phone_Father = $My_Parent->Phone_Father;
            $this->Nationality_Father = $My_Parent->Nationality_Father;
            $this->Blood_Type_Father = $My_Parent->Blood_Type_Father;
            // Mother_Info
            $this->Name_Mother = $My_Parent->Name_Mother;
            $this->National_ID_Mother =$My_Parent->National_ID_Mother;
            $this->Phone_Mother = $My_Parent->Phone_Mother;
            $this->Nationality_Mother = $My_Parent->Nationality_Mother;
            $this->Blood_Type_Mother= $My_Parent->Blood_Type_Mother;
            $this->Email=$My_Parent->Email;
            $this->Password=$My_Parent->Password;
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };

    }
    public function delete($id){
        My_Parent::find($id)->delete();
        return redirect()->to('/add_parent');
    }
    public function firstStepSubmit_update(){
        $this->updateMode=  true;
        $this->currentStep = 2;
        }
        public function secondStepSubmit_update(){
            $this->updateMode=  true;
            $this->currentStep = 3;
        }
        public function submitForm_edit(){

            if ($this->Parent_id){
                $parent = My_Parent::find($this->Parent_id);
                $parent->update([
                    'Name_Father' => $this->Name_Father,
                    'Name_Grand' => $this->Name_Grand,
                    'National_ID_Father' => $this->National_ID_Father,
                    'Phone_Father' => $this->Phone_Father,
                    'Job_Father' => $this->Job_Father,
                    'Nationality_Father_id' => $this->Nationality_Father,
                    'Blood_Type_Father_id' => $this->Blood_Type_Father,
                    'Name_Mother' => $this->Name_Mother,
                    'National_ID_Mother' => $this->National_ID_Mother,
                    'Phone_Mother' => $this->Phone_Mother,
                    'Nationality_Mother' => $this->Nationality_Mother,
                    'Blood_Type_Mother' => $this->Blood_Type_Mother,
                    'Email' => $this->Email,
                    'Password' => Hash::make($this->Password),
                ]);

            }

            return redirect()->to('/add_parent');
        }

    private function getNationalities()
    {
        return [
            'سوري', 'سعودي', 'مصري', 'أردني', 'لبناني',
            'إماراتي', 'قطري', 'كويتي', 'بحريني', 'عماني',
            'عراقي', 'فلسطيني', 'يمني', 'جزائري', 'مغربي',
            'تونسي', 'ليبي', 'سوداني', 'موريتاني', 'صومالي',
            'جزر القمر', 'مالي', 'تشادي', 'جيبوتي', 'إريتري',
            'سنغالي', 'غيني', 'ليبيري', 'سيراليوني', 'نيجيري',
            'غانا', 'بنين', 'توغو', 'بوركينا فاسو', 'النيجر'
            ,'غير معروفة'
        ];
    }
    private function getNationalitiesMother()
    {
        return [
            'سورية',
            'أفغانية',
            'أرمينية',
            'أذرية',
            'بحرينية',
            'بنجلاديشية',
            'برونايية',
            'كمبودية',
            'صينية',
            'قبرصية',
            'جيبوتية',
            'إيرانية',
            'عراقية',
            'هندية',
            'إندونيسية',
            'أردنية',
            'كازاخية',
            'قيرغيزية',
            'كورية شمالية',
            'كورية جنوبية',
            'كويتية',
            'لاوسية',
            'لبنانية',
            'ماليزية',
            'مالديفية',
            'منغولية',
            'ميانمارية',
            'نيبالية',
            'عمانية',
            'باكستانية',
            'فلسطينية',
            'فلبينية',
            'قطرية',
            'روسية',
            'سعودية',
            'سنغافورية',
            'سريلانكية',
            'طاجيكية',
            'تايلاندية',
            'تركمانية',
            'إماراتية',
            'أوزبكية',
            'فيتنامية',
            'يمنية',
            'مصرية',
            'جزائرية',
            'قُمَرية',
            'ليبية',
            'مغربية',
            'موريتانية',
            'سودانية',
            'تونسية',
            'غير معروفة'
        ];
    }
    public function bloodType(){
        return [
            'O+',
            'O-',
            'A+',
            'A-',
            'B+',
            'B-',
            'AB+',
            'AB-',
            'غير معروفة'
        ];
    }

}
