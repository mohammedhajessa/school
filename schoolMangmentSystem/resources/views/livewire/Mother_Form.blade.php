@php
    $style = "font-size:20px;font-family: Times, serif;"
@endphp
@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title" style="{{ $style }}">اسم الأم الكامل</label>
                        <input type="text" wire:model="Name_Mother" class="form-control">
                        @error('Name_Mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="title" style="{{ $style }}">الرقم الوطني_رقم الهوية:</label>
                        <input type="text" wire:model="National_ID_Mother" class="form-control">
                        @error('National_ID_Mother')
                        <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title" style="{{ $style }}">رقم هاتف الأم:</label>
                        <input type="text" wire:model="Phone_Mother" class="form-control">
                        @error('Phone_Mother')
                        <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity" style="{{ $style }}">جنسية الأم:</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Mother">
                            <option selected style="{{ $style }}">اختر...</option>
                            @foreach($this->getNationalitiesMother() as $national)
                                <option value="{{$national}}" style="{{ $style }}">{{$national}}</option>
                            @endforeach
                        </select>
                        @error('Nationality_Mother')
                        <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState" style="{{ $style }}">زمرة دم الأم</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Mother">
                            <option selected style="{{ $style }}">اختر...</option>
                            @foreach($this->bloodType() as $blood)
                                <option value="{{$blood}}" style="{{ $style }}">{{$blood}}</option>
                            @endforeach
                        </select>
                        @error('Blood_Type_Mother')
                        <div class="alert alert-danger" style="{{ $style }}">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @if ($updateMode)
                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)" style="{{ $style }}">
                    السابق
                </button>

                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                        wire:click="secondStepSubmit_update" style="margin-right:10px;{{ $style }}">التالي</button>

            </div>
        @else

            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)" style="{{ $style }}">
                السابق
            </button>

            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                    wire:click="secondStepSubmit" style="margin-right:10px;{{ $style }}">التالي</button>

        </div>
                @endif
        </div>
    </div>

