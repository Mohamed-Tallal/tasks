@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('store') }}">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">

            <label for="countries_disabled" class="block text-sm font-medium leading-6 text-gray-900">Assigned By</label>
          <div class="mt-2">
            <select id="countries_disabled" class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" name="assigned_by">
              <option selected value="">Choose Admin</option>
              @foreach ($admins as $admin)
              <option value="{{ $admin->id }}">{{ $admin->name }}</option>
              @endforeach
            </select>
          </div>

          <div>
            @error('assigned_by')
            <div class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-2 pr-0 mt-2">
                <p class="text-sm">
                    {{$message}}
                </p>
            </div>
            @enderror

            </div>

          </div>

          <div class="col-span-full">
            <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
            <div class="mt-2">
              <input type="text" name="title" value="{{ old('title') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>

          <div>
            @error('title')
            <div class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-2 pr-0 mt-2">
                <p class="text-sm">
                    {{$message}}
                </p>
            </div>
            @enderror
          </div>

          </div>

          <div class="col-span-full">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
            <div class="mt-2">
              <textarea id="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="description">
                {{ old('description') }}
              </textarea>
            </div>
            <div>
                @error('description')
                <div class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-2 pr-0 mt-2">
                    <p class="text-sm">
                        {{$message}}
                    </p>
                </div>
                @enderror
          </div>

          </div>
          <div class="col-span-full">

              <label for="countries_disabled" class="block text-sm font-medium leading-6 text-gray-900">Assigned To</label>
            <div class="mt-2">
              <select id="countries_disabled" class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" name="assigned_to">
                <option selected value="">Choose User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
            </div>
            <div>
                @error('assigned_to')
                <div class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-2 pr-0 mt-2">
                    <p class="text-sm">
                        {{$message}}
                    </p>
                </div>
                @enderror
          </div>

            </div>

        </div>
      </div>
      <button type="submit" class="items-center rounded-md text-blue-500 border border-blue-500 hover:border-blue-400 hover:bg-blue-50 text-sm font-medium px-3 py-2 shadow-sm"> Save </button>
    </div>

    </form>
@endsection
