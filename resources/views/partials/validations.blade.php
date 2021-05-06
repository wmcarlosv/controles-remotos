@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
    	<a href="#" class="close" style="text-decoration: none; font-weight: bold; color: black;" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif