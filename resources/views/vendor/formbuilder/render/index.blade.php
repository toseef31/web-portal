@extends('formbuilder::layout')

@section('content')
<?php
  // print_r($type); die;
 ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">{{ $pageTitle }}</h5>
                </div>

                <form action="{{ route('formbuilder::form.submit', $form->identifier) }}" method="POST" id="submitForm" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div id="fb-render"></div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary confirm-form" data-form="submitForm" data-message="Submit your entry for '{{ $form->name }}'?">
                            <i class="fa fa-submit"></i> Submit Form
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push(config('formbuilder.layout_js_stack', 'scripts'))
    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
    </script>
    <script>
    $(document).ready(function () {
      var type ="{{$type}}";
      if (type !="") {
        alert(type);
        // $("label[for='event_Please specify']").css('display', 'block');
        $(".rendered-form .form-control").css("direction","rtl");
      }

    })
    </script>
    <script src="{{ asset('vendor/formbuilder/js/render-form.js') }}{{ jazmy\FormBuilder\Helper::bustCache() }}" defer></script>
@endpush
