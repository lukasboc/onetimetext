@csrf

<div class="flex flex-col gap-4">
    <div class="form-control gap-1">
        <label class="label" for="name"><span class="label-text">Name</span></label>
        <input name="name" type="text" id="name"
               class="input input-bordered @error('name') input-error @enderror"
               value="{{ old('name') }}@isset($user){{ $user->name }}@endisset" />
        @error('name')
            <p class="text-error text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-control gap-1">
        <label class="label" for="email"><span class="label-text">Email address</span></label>
        <input name="email" type="email" id="email"
               class="input input-bordered @error('email') input-error @enderror"
               value="{{ old('email') }}@isset($user){{ $user->email }}@endisset" />
        @error('email')
            <p class="text-error text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    @isset($create)
        <div class="form-control gap-1">
            <label class="label" for="password"><span class="label-text">Password</span></label>
            <input name="password" type="password" id="password"
                   class="input input-bordered @error('password') input-error @enderror" />
            @error('password')
                <p class="text-error text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-control gap-1">
            <label class="label" for="password_confirmation"><span class="label-text">Password Confirm</span></label>
            <input name="password_confirmation" type="password" id="password_confirmation"
                   class="input input-bordered @error('password_confirmation') input-error @enderror" />
            @error('password_confirmation')
                <p class="text-error text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    @endisset

    <div class="flex flex-col gap-2">
        @foreach($roles as $role)
            <label class="label cursor-pointer justify-start gap-3">
                <input class="checkbox checkbox-primary" name="roles[]"
                       type="checkbox" value="{{ $role->id }}" id="{{ $role->name }}"
                       @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset />
                <span class="label-text">{{ $role->name }}</span>
            </label>
        @endforeach
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
