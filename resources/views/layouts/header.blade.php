

<header class="bg-white space-y-4 p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">
    <div class="flex items-center justify-between">
      <a class="font-semibold text-slate-900" >Tasks</a>
      <div class="flex items-center justify-between">
        <a href="{{ route('index') }}" class="group flex rounded-md text-blue-500 border border-blue-500 hover:border-blue-400 hover:bg-blue-50 text-sm font-medium px-3 py-2 shadow-sm mx-2">Task List </a>
        <a href="{{ route('create') }}" class="group flex rounded-md text-blue-500 border border-blue-500 hover:border-blue-400 hover:bg-blue-50 text-sm font-medium px-3 py-2 shadow-sm mx-2">Create Task</a>
        <a href="{{ route('statistic.index') }}" class="group flex rounded-md text-blue-500 border border-blue-500 hover:border-blue-400 hover:bg-blue-50 text-sm font-medium px-3 py-2 shadow-sm mx-2">Statistics</a>
      </div>
    </div>
</header>
