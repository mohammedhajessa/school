@php
    $style = "padding:10px;font-size:20px;font-family: Times, serif;"
@endphp
@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="col">
                        <label for="title" style="{{ $style }}">اسم الأب الكامل:</label>
                        <input type="text" wire:model="Name_Father" class="form-control"  style="{{ $style }}">
                        @error('Name_Father')
                        <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title" style="{{ $style }}">الإيميل:</label>
                        <input type="email" wire:model="Email" class="form-control"  style="{{ $style }}">
                        @error('Email')
                        <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title" style="{{ $style }}">كلمة السر:</label>
                        <input type="{{ $showPassword ? 'text' : 'Password' }}"id="password"wire:model.defer="Password"class="form-control" placeholder="كلمة المرور"/>
                        @error('Password')
                        <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col">
                        <label for="title" style="{{ $style }}">اسم الجد:</label>
                        <input type="text" wire:model="Name_Grand" class="form-control"  style="{{ $style }}">
                        @error('Name_Grand')
                        <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title" style="{{ $style }}">وظيفة الأب:</label>
                        <input type="text" wire:model="Job_Father" class="form-control"  style="{{ $style }}">
                        @error('Job_Father')
                        <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col">
                        <label for="title" style="{{ $style }}">الرقم الوطني_رقم الهوية :</label>
                        <input type="text" wire:model="National_ID_Father" class="form-control"  style="{{ $style }}">
                        @error('National_ID_Father')
                        <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col">
                        <label for="title" style="{{ $style }}">رقم هاتف الأب:</label>
                        <input type="text" wire:model="Phone_Father" class="form-control" style="{{ $style }}">
                        @error('Phone_Father')
                        <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity" style="{{ $style }}">جنسية الأب:</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Father">
                            <option selected style="{{ $style }}">اختر...</option>
                            @foreach($this->getNationalities() as $national)
                                <option value="{{$national}}" style="{{ $style }}">{{$national}}</option>
                            @endforeach
                        </select>
                        @error('national')
                        <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState" style="{{ $style }}">زمرة دم الأب:</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Father">
                            <option selected style="{{ $style }}">اختر...</option>
                            @foreach($this->bloodType() as $Type_Blood)
                                <option value="{{$Type_Blood}}" style="{{ $style }}">{{$Type_Blood}}</option>
                            @endforeach
                        </select>
                        @error('Blood_Type_Father')
                        <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @if ($updateMode)
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit_update"
                        type="button" style="{{ $style }}">التالي
                </button>
                @else
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                        type="button" style="{{ $style }}">التالي
                </button>
                @endif

            </div>
        </div>
    </div>
