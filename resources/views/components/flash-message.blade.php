@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="card mb-2 py-0  position-absolute flast-pos">
        <div class="card-body text-center ">
            <span class="text-light text-lg bg-success">
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