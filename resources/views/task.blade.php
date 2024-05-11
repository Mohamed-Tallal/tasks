@extends('layouts.app')

@section('content')
<div>
    @if ($tasks->count() > 0)

    <table class="min-w-full border divide-y divide-gray-200">
      <thead>
      <tr>
          <th class="px-6 py-3 bg-gray-50">
              <span class="float-left text-xs font-medium tracking-wider leading-4 text-left text-gray-500">#</span>
          </th>
          <th class="px-6 py-3 bg-gray-50">
            <span class="float-left text-xs font-medium tracking-wider leading-4 text-left text-gray-500">Title</span>
        </th>
          <th class="px-6 py-3 bg-gray-50">
              <span class="float-left text-xs font-medium tracking-wider leading-4 text-left text-gray-500">Description</span>
          </th>
          <th class="px-6 py-3 bg-gray-50">
            <span class="float-left text-xs font-medium tracking-wider leading-4 text-left text-gray-500">Assigned To</span>
        </th>
        <th class="px-6 py-3 bg-gray-50">
            <span class="float-left text-xs font-medium tracking-wider leading-4 text-left text-gray-500">Assigned By</span>
        </th>
          <th class="px-6 py-3 bg-gray-50">
              <span class="float-left text-xs font-medium tracking-wider leading-4 text-left text-gray-500">Creation date</span>
          </th>

      </tr>
      </thead>

      <tbody class="bg-white divide-y divide-gray-200 divide-solid">
        @foreach ( $tasks as $index => $task)
        <tr class="bg-white">
            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
               {{ ++$index }}
            </td>
            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                {{ $task->title }}
            </td>
            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                {{ $task->description }}
            </td>
            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                {{ $task->assignedTo->name }}
          </td>
          <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            {{ $task->assignedBy->name }}
          </td>
          <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            {{ $task->created_at->diffForHumans() }}

          </td>
        </tr>

        @endforeach


      </tbody>

    </table>

        {{$tasks->appends(request()->query())->links()}}

    @else
    <div >
        <h2 class="text-center py-12 font-bold">there is no tasks</h2>
    </div>
    @endif

  </div>

@endsection
