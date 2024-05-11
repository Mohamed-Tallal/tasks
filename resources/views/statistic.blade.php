@extends('layouts.app')

@section('content')
<div>
    @if ( $statistics ->count() > 0)

    <table class="min-w-full border divide-y divide-gray-200">
      <thead>
      <tr>
        <th class="px-6 py-3 bg-gray-50">
            <span class="float-left text-xs font-medium tracking-wider leading-4 text-left text-gray-500">#</span>
        </th>
        <th class="px-6 py-3 bg-gray-50">
            <span class="float-left text-xs font-medium tracking-wider leading-4 text-left text-gray-500">User Name</span>
        </th>
        <th class="px-6 py-3 bg-gray-50">
            <span class="float-left text-xs font-medium tracking-wider leading-4 text-left text-gray-500">Tasks Count</span>
        </th>
      </tr>
      </thead>

      <tbody class="bg-white divide-y divide-gray-200 divide-solid">
        @foreach ( $statistics as $index => $statistic)
        <tr class="bg-white">
            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
               {{ ++$index }}
            </td>
            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                {{ $statistic->user->name }}
            </td>
            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                {{ $statistic->tasks_count }}
            </td>
        </tr>

        @endforeach


      </tbody>

    </table>


    @else
    <div >
        <h2 class="text-center py-12 font-bold">there is no statistics </h2>
    </div>
    @endif

  </div>

@endsection
