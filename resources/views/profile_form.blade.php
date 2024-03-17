@extends('layouts.structure')

@section('content')
<div class="flex items-center justify-center p-4 md:p-12">
  <div class="mx-auto w-full max-w-md bg-white shadow-md rounded-lg px-6 py-8">
    <h2 class="text-gray-700 text-2xl font-bold mb-4">Edit Profile</h2>
    <form action="{{ route('profile.update', $profile->user_id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
        <input type="text" name="name" id="name" value="{{ $profile->name }}"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          required>
      </div>

      <div class="mb-4">
        <label for="bio" class="block text-gray-700 text-sm font-bold mb-2">Bio</label>
        <textarea name="bio" id="bio"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          required>{{ $profile->bio }}</textarea>
      </div>

      <div class="mb-4">
        <label for="dob" class="block text-gray-700 text-sm font-bold mb-2">Date of Birth</label>
        <input type="date" name="dob" id="dob" value="{{ $profile->dob }}"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          required>
      </div>

      <div class="mb-4">
        <label for="country" class="block text-gray-700 text-sm font-bold mb-2">Country</label>
        <input type="text" name="country" id="country" value="{{ $profile->country }}"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          required>
      </div>

      <div class="mb-4">
        <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Profile Photo</label>
        <input type="file" name="photo" id="photo"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      </div>

      <div class="flex items-center justify-center mt-6">
        <button type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save
          Profile</button>
      </div>
    </form>
  </div>
</div>
@endsection
