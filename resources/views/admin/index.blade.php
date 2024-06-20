@extends('layouts.admin')
@section('content')
<div class="container px-6 mx-auto grid">
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Dashboard
  </h2>
  <!-- CTA -->
  <div style="border-radius: 5px;" class="bg-purple-600 py-5" >
      <h1 style="font-family: Lora, serif;" class="text-3xl  font-semibold text-white dark:text-gray-100 mx-11">
   Good Morning {{Auth::user()->name}}, 
  </h1>
  </div>
</div>
<!-- Cards -->

</div>

@endsection