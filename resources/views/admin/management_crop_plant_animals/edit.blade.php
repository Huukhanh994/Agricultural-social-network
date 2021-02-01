@extends('admin.app')

@section('title')
{{$pageTitle}}
@endsection
@section('custom_css')
<link rel="stylesheet" href="{{asset('/assets/node_modules/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.manager_crop_plant_animals.update',$cpa->crop_plant_animal_id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h3 class="card-title">Crop plant animal Info</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Code</label>
                                    <input type="text" name="crop_plant_animal_code" id="cropPlantAnimalCode" class="form-control"
                                        value="{{$cpa->crop_plant_animal_code}}">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="crop_plant_animal_name" id="cropPlantAnimalName"
                                        class="form-control form-control-danger" value="{{$cpa->crop_plant_animal_name}}">
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label">Growth time</label>
                                    <input type="text" name="last_name" id="lastName" class="form-control form-control-danger"
                                        value="{{$cpa->crop_plant_animal_growth_time}}">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Color</label>
                                    <input type="text" name="birth" class="form-control" value="{{$cpa->crop_plant_animal_color}}">
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Weight</label>
                                    <input type="text" name="birth" class="form-control" value="{{$cpa->crop_plant_animal_weight}}">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label">Height</label>
                                        <input type="text" name="birth" class="form-control" value="{{$cpa->crop_plant_animal_height}}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <h3 class="box-title m-t-40">Product Type</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Product</label>
                                    <select class="form-control custom-select" name="ward_id"
                                        data-placeholder="Choose a Ward" tabindex="1">
                                        @foreach ($product_type as $product)
                                            @if ($cpa->product_id == $product->product_id)
                                                <option value="{{$cpa->product_id}}" selected>{{$cpa->product->product_name}}
                                                </option>
                                            @else
                                                <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        <button type="button" class="btn btn-inverse">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
@endsection

@section('custom_js')
<!-- jQuery file upload -->
<script src="{{asset('/assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
            // Basic
            $('.dropify').dropify();
    
            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });
    
            // Used events
            var drEvent = $('#input-file-events').dropify();
    
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
    
            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });
    
            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });
    
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
</script>
@endsection