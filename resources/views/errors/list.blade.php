@if($errors->any())
    {{--if there are any errors we display them in an unordered list.--}}
    <ul class="alert alert-danger" style="margin: 10px 0 10px 0; padding: 0 25px;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif