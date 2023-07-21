<x-app-layout>
<div class="w-full max-w-2xl my-6 mx-auto">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('roles.store') }}">
        @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
          role
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="role" type="text" placeholder="role" name="name" value="{{ $role->name }}" readonly>
        <x-input-error for="name" />
      </div>
      <div class="grid grid-cols-3 text-sm">
        @foreach ($permissions as $permission)
        <div class="flex items-center">
            <input type="checkbox" name="permission[]" value="{{ $permission->id }}" checked>
            <label class="mx-2" for="permission">{{ $permission->name }}</label>
        </div>

        @endforeach
      </div>
      <hr class="my-4">

      <div class="flex items-center justify-end gap-6">
       <a href="{{ route('roles.index') }}"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
            {{ __('ok') }}
          </a>
      </div>
    </form>
  </div>
</x-app-layout>
