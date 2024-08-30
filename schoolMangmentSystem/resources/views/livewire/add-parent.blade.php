@php
    $style = "font-size:20px;font-family: Times, serif;"
@endphp
<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert"style="{{ $style }}">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

        @if ($catchError)
            <div class="alert alert-danger" id="success-danger"style="{{ $style }}">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ $catchError }}
            </div>
        @endif

    @if ($show_table)
    @include('livewire.show_table')
    @else
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                    class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p style="{{ $style }}">الأب</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                    class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p style="{{ $style }}">الام</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                    class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                    disabled="disabled">3</a>
                <p style="{{ $style }}">تاكيد</p>
            </div>
        </div>
    </div>


    @include('livewire.Father_Form')

    @include('livewire.Mother_Form')
    @endif
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        @if ($currentStep != 3)
            <div style="display: none" class="row setup-content" id="step-3">
                @endif

                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3 style="font-family: 'Cairo', sans-serif;" style="padding:10px{{ $style }}">هل انت متاكد من حفظ البيانات ؟</h3><br>
                        <input type="hidden" wire:model="Parent_id">
                        @if ($updateMode)
                        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                                wire:click="back(2)" style="{{ $style }}">السابق</button>
                        <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm_edit"
                                type="button" style="margin-right:10px;{{ $style }}">التالي</button>

                        @else
                        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                                wire:click="back(2)" style="{{ $style }}">السابق</button>
                                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                                type="button" style="margin-right:10px;{{ $style }}">التالي</button>
                        @endif
                    </div>
                </div>
            </div>
    </div>
