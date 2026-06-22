$(function () {
  $('#sellerChatModal').on('show.bs.modal', function (e) {
    var btn = $(e.relatedTarget);
    $('#sellerChatName').text(btn.data('seller') || 'Seller');
    $('#sellerChatAvatar').attr({ src: btn.data('avatar') || '', alt: btn.data('seller') || 'Seller' });
    $('#sellerChatBody').html('<div class="chat-bubble them">Hi! Happy to help with this listing 👶</div>');
  });

  $('#sellerChatModal .seller-chat-send').on('click', function () {
    var input = $(this).closest('.input-group').find('input');
    var msg = $.trim(input.val());
    if (!msg) return;
    var body = $('#sellerChatBody');
    body.append('<div class="chat-bubble me">' + $('<div>').text(msg).html() + '</div>');
    input.val('');
    body.scrollTop(body[0].scrollHeight);
  });
});
