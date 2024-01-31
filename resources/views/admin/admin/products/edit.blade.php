@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper">
        <div class="adminHomePageTitle">Add Product</div>
        <div class="formEdit" style="padding-bottom: 50px">
            <form action="{{route('admin.update.product', $product)}}" method="POST" class="registerEmployeeForm" enctype="multipart/form-data">
                @csrf
                <label class="formLabel" for="course_name">Product Name</label>
                <input class="formInputProfile" type="text" id="product_name" name="product_name" value="{{$product->name}}">
                <label class="formLabel" for="course_name">Image</label>
                <input type="file" name="image" value="">
                <label class="formLabel" for="course_name">Duration Training</label>
                <input class="formInputProfile" type="text" id="" name="duration" value="{{$product->durationTraining}}">
                <label class="formLabel" for="course_name">Validity</label>
                <input class="formInputProfile" type="text" id="" name="validity" value="{{$product->certificateValidity}}">
                <label class="formLabel" for="course_name">Price</label>
                <input class="formInputProfile" type="text" id="" name="price" value="{{$product->price}}">
                <label class="formLabel" for="course_name">Trainer</label>
                <select name="trainer" id="">
                    <option value="">No trainer</option>
                    <option value="Cristian">Cristian</option>
                </select>
                <label class="formLabel" for="course_name">Status: Active Or Comming Soon</label>
                <input type="checkbox" id="" name="status" value="1">
                <script>
                    tinymce.init({
                        selector: 'textarea',
                        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                        tinycomments_mode: 'embedded',
                        tinycomments_author: 'Author name',
                        mergetags_list: [
                            { value: 'First.Name', title: 'First Name' },
                            { value: 'Email', title: 'Email' },
                        ],
                        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
                    });
                </script>
                <textarea name="description" id="" cols="30" rows="10">
                    {{ $product->description }}
                </textarea>
                <button type="submit" class="adminButton">Add</button>
            </form>
        </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
