@if(session('error'))
    <div role="alert" class="alert alert-error mb-6">
        <x-icons.exclamation-triangle class="size-5 shrink-0" />
        <span>{{ session('error') }}</span>
    </div>
@endif

@if(session('success'))
    <div role="alert" class="alert alert-success mb-6">
        <x-icons.check class="size-5 shrink-0" />
        <span>{{ session('success') }}</span>
    </div>
@endif

@if($errors->any())
    <div role="alert" class="alert alert-error mb-6">
        <x-icons.exclamation-triangle class="size-5 shrink-0" />
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
