<x-profile :sharedData="$sharedData" doctitle="{{$sharedData['username']}}'s Following">
    @include('profile-following-only')
  </x-profile>