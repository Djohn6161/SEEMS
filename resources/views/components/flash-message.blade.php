@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="card mb-2 py-0  position-absolute flast-pos">
        <div class="card-body text-center ">
            <span class="text-light text-lg ">
                {{ session('message') }}
            </span>
        </div>
    </div>
@endif
@if (session()->has('error'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="card my-4 py-0 position-absolute danger-flash alert-danger alert" style="z-index: 3;">
        <div class="card-body text-center">
            <span class=" text-lg text-center">
                {{ session('error') }}
            </span>


        </div>
    </div>
@endif
@if ($errors->any() || $errors->create->any() || $errors->update->any())
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="card my-4 py-0 position-absolute danger-flash alert-danger alert" style="z-index: 3;">
        <div class="card-body my-4 text-center">
            <h5 class="mb-3 text-uppercase font-weight-bold">
                Errors submission of data
            </h5>
            @foreach ($errors->create->all() as $error)
                <span class="text-sm">
                    {{ $error }}
                </span>
            @endforeach
            @foreach ($errors->update->all() as $error)
                <span class="text-sm">  
                    {{ $error }}
                </span>
            @endforeach
            @foreach ($errors->all() as $error)
                <span class="text-sm">
                    {{ $error }}
                </span>
            @endforeach


        </div>
    </div>
@endif