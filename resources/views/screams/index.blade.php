<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Screams') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <ul>
                      @foreach ($screams as $scream)
                      <li style="margin-bottom:20px;border:1px solid #ccc;overflow:hidden;border-radius:5px;box-shadow: 2px 2px 2px 2px #ddd;">
                        <dl style="display:flex;flex-direction:row;">
                          <dt style=""><img style="width:100px" src="https://www.shoshinsha-design.com/wp-content/uploads/2018/07/user_icon.png"></dt>
                          <dd style="width:100%;padding:10px;">
                            <div><a href="#">{{ $scream->user_id }}</a></div>
                            <div>{{ $scream->scream_text }}<span style="padding-left:5px;font-size:20px;font-weight:bold">!!</span></div>
                            <div style="font-size:10px;text-align:right">{{ $scream->created_at }}</div>
                            <form action="{{ route('screams.favorite') }}" method="POST">
                              @csrf
                              <input type="hidden" name="body" id="body" value="{{ $scream->id }}">
                              <div class="mt-3">
                                <x-button class="ml-3">
                                  @if( optional(optional($scream->favorites)->first())->user_id == Auth::id() )
                                    {{ __('お気に入り解除') }}
                                  @else
                                    <input type="hidden" name="flag" id="flag" value="1">
                                    {{ __('お気に入り追加') }}
                                  @endif
                                </x-button>
                              </div>
                            </form>
                          </dd>
                        </dl>
                      </li>
                      @endforeach
                  </ul>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
