<style>
  .seller-chat-dialog { max-width: 320px; }
  .seller-chat-header { background: linear-gradient(135deg, #ffb8c9, #ffc8a8); color: #fff; }
  .seller-chat-body { background: #fff9fb; min-height: 160px; max-height: 200px; overflow-y: auto; }
  .chat-bubble { display: inline-block; padding: .45rem .7rem; border-radius: 1rem; font-size: .85rem; max-width: 88%; margin-bottom: .4rem; }
  .chat-bubble.them { background: #fff; border: 1px solid #f0e0e4; }
  .chat-bubble.me { background: #333; color: #fff; margin-left: auto; display: block; width: fit-content; }
</style>

<div class="modal fade" id="sellerChatModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered seller-chat-dialog">
    <div class="modal-content border-0 shadow rounded-4 overflow-hidden">
      <div class="seller-chat-header d-flex align-items-center gap-2 p-3">
        <img id="sellerChatAvatar" src="" alt="" width="36" height="36" class="rounded-circle border border-2 border-white">
        <div class="flex-grow-1">
          <strong id="sellerChatName" class="d-block">Seller</strong>
          <small class="text-white-50">Usually replies quickly 💬</small>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="seller-chat-body p-3" id="sellerChatBody">
        <div class="chat-bubble them">Hi! Happy to help with this listing 👶</div>
      </div>
      <div class="p-2 border-top bg-white">
        <div class="input-group input-group-sm px-1">
          <input type="text" class="form-control rounded-pill border-2 seller-chat-input" placeholder="Say hello..." aria-label="Message">
          <button class="btn btn-dark rounded-circle seller-chat-send ms-1 flex-shrink-0" type="button" style="width:34px;height:34px;padding:0"><i class="bi bi-send"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>
