<!-- resources/views/group/index.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('募集中のグループ一覧') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">募集中のグループ一覧</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($groups as $group)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
               
                   @if ($group->user_id === Auth::user()->id)
                   <p class="text-left text-red-600">管理しています</p>
                   @else
                   <p class="text-left text-grey-dark">管理人：{{$group->user->name}}</p>
                   @endif
               
                  <a href="{{ route('group.show',$group->id) }}">
                    <h3 class="text-left font-bold text-lg text-grey-dark">{{$group->name}}</h3>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

