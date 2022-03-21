<!-- resources/views/group/room.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('グループの部屋') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
         
           <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">学んだことの共有</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                    @if ($group->user_id === Auth::user()->id)
                     <p class="text-left text-red-600">あなたの投稿です</p>
                    @else
                     <p class="text-left text-grey-dark">投稿者：{{$post->user->name}}</p>
                    @endif
                    <h3 class="text-left font-bold text-lg text-grey-dark">{{$post->post}}</h3>
                    <h3 class="text-left text-lg text-grey-dark">{{$post->description}}</h3>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
          <div class="bg-white">
          @include('common.errors')
            <h1 class="text-center py-6 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark">学んだことを投稿する</h1>
            <form class="mb-6" action="{{ route('post.store') }}" method="POST">
              @csrf
              <div class="flex flex-col mb-4">
                <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="post">学んだテーマ／カテゴリー</label>
                <input class="border py-2 px-3 text-grey-darkest" type="text" name="post" id="post">
              </div>
              <div class="flex flex-col mb-4">
                <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="description">学習内容</label>
                <textarea class="border py-2 px-3 text-grey-darkest" type="text" name="description" id="description"></textarea>
              </div>
              <div>
                <input type="hidden" name="group_id" value="{{$group->id}}">
              </div>
              <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                Create
              </button>
            </form>
          </div>
            
          <div class="mb-6">
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">グループ名</p>
              <p class="py-2 px-3 text-grey-darkest" id="name">
                {{$group->name}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">グループの説明</p>
              <p class="py-2 px-3 text-grey-darkest" id="description">
                {{$group->description}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">グループの募集条件</p>
              <p class="py-2 px-3 text-grey-darkest" id="condition">
                {{$group->condition}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">グループの活動終了日</p>
              <p class="py-2 px-3 text-grey-darkest" id="end_date">
                {{$group->end_date}}
              </p>
            </div>
            
            <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">グループメンバー（{{ $group->users()->count() }}人）</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($members as $member)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                  <h3 class="text-left text-lg text-grey-dark">{{$member->name}}</h3>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
            
    
            <a href="{{ route('group.mygroup') }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
              Back
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
