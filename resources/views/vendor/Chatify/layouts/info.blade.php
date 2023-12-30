{{-- user info and avatar --}}
{{-- <div class="avatar av-l chatify-d-flex"></div> --}}
{{-- <div>
    <img src="{{ auth()->user()->profile_photo_url }}" class="av-s" style="border-radius: 50px;" width="35" height="35" alt="{{ auth()->user()->name }}">
</div> --}}
<p class="info-name">{{ config('chatify.name') }}</p>
<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Delete Conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title"><span>Shared Photos</span></p>
    <div class="shared-photos-list"></div>
</div>
