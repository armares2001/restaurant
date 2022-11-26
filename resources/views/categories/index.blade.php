<x-guest-layout>
  <div
      class="container  max-w-lg px-4 py-56 mx-auto text-left bg-center bg-no-repeat bg-cover sm:max-w-none md:text-center min-h-max"
      style="background-image: url('https://cdn.pixabay.com/photo/2016/11/18/14/39/beans-1834984_960_720.jpg')">
      <h1
        class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 text-center sm:leading-none lg:text-5xl">
        <span class="inline md:block">Welcome To Categories</span>
      </h1>
      
      {{-- <div class="flex flex-col items-center mt-12 text-center">
        <span class="relative inline-flex w-full md:w-auto">
          <a href="{{route('reservations.step.one')}}" type="button"
            class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-green-600 rounded-full lg:w-full md:w-auto hover:bg-green-500 focus:outline-none">
            Make your Reservation
          </a>
      </div> --}}
    </div>
    <div class="container w-full px-5 py-6 mx-auto">
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-y-6 justify-center ">
            @foreach ($categories as $category)        
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg mx-auto text-center w-72">
              <img class="w-full h-48" src="{{Storage::url($category->image)}}"
                alt="Image" />
              <div class="px-6 py-4">
                <a href="{{route('categories.show' ,$category->id)}}">
                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase hover:text-green-400">{{$category->name}}</h4>

                </a>
              </div>
            </div>
            @endforeach
        </div>
      </div>
</x-guest-layout>