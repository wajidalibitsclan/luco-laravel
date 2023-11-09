@extends('admin.app')
@section('main-content')
    <div id="page_content">
        <div id="top_bar">
            <ul id="breadcrumbs">
                <li><a href="{{route('admin.videos.index')}}">Videos</a></li>
            </ul>
        </div>
        <div id="page_content_inner">
            @if(Session::has('success'))
                <div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>
                    {{ Session::get('success') }}
                </div>
            @endif
                @if (count($errors) > 0)
                    {!! form_errors($errors) !!}
                @endif
            <form method="post" action="{{route('admin.videos.store')}}">
                {{ csrf_field() }}
                <div class="uk-grid" data-uk-grid-margin="">
                    <div class="uk-width-medium-3-4 uk-row-first">
                        <div class="md-card">
                            <div class="md-card-content">
                                <div class="uk-form-row" data-uk-grid-margin>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 uk-row-first">
                                            <div class="md-input-wrapper">
                                                <h3 class="heading_c">Title</h3>
                                                <input type="text" class="md-input" value="{{old('title')}}" name="title">
                                                <span class="md-input-bar"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" data-uk-grid-margin>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 uk-row-first">
                                            <div class="md-input-wrapper">
                                                <h3 class="heading_c">Video order</h3>
                                                <input type="number" min="1" maxlength="1" class="md-input" value="{{old('order')}}" name="order">
                                                <span class="md-input-bar"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" data-uk-grid-margin>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 uk-row-first">
                                            <div class="md-input-wrapper">
                                                <h3 class="heading_c">Category</h3>
                                                <select name="category" id="category" class="md-input">
                                                    @foreach($categories as $key=>$category)
                                                        <option value="{{$key}}" {{ (old("category") == $key ? "selected":"") }}>{{$category}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" data-uk-grid-margin>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 uk-row-first">
                                            <div class="md-input-wrapper">
                                                <h3 class="heading_c">Video link</h3>
                                                <input type="text" class="md-input" name="link" value="{{old('link')}}">
                                                <span class="md-input-bar"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" data-uk-grid-margin>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 uk-row-first">
                                            <div class="md-input-wrapper">
                                                <h3 class="heading_c uk-margin-bottom">Description</h3>
                                                <textarea id="wysiwyg_ckeditor" class="md-input selecize_init" name="description">{{old('description')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <div class="md-card">
                            <div class="md-card-content">
                                <div class="uk-grid" data-uk-grid-margin="">
                                    <div class="uk-width-medium-1-1">
                                        <span class="uk-input-group-addon"><input type="submit" class="md-btn" value="Salva"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@push('specific_scripts')
    <script src="{{asset('adminassets/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('adminassets/bower_components/ckeditor/adapters/jquery.js')}}"></script>
    <!--  wysiwyg editors functions -->
    <script src="{{asset('adminassets/assets/js/pages/forms_wysiwyg.min.js')}}"></script>
@endpush