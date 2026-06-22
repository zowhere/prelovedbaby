/**
 opens a chat modal for any listing with seller data.
 */
(function ($) {
  "use strict";

  var DEFAULT_GREETING = "Hi! Happy to help with this listing 👶";

  function escapeHtml(text) {
    return $("<div>")
      .text(text || "")
      .html();
  }

  function sellerFirstName(name) {
    return (name || "Seller").trim().split(/\s+/)[0];
  }

  function readSellerFromCard($card) {
    var seller = $card.attr("data-seller") || $card.data("seller");
    var avatar = $card.attr("data-seller-avatar") || $card.data("sellerAvatar");

    if (!seller) {
      var $sellerRow = $card.find(".listing-seller").first();
      if ($sellerRow.length) {
        seller = $sellerRow.find(".fw-semibold").first().text().trim();
        avatar = avatar || $sellerRow.find(".seller-avatar").attr("src") || "";
      }
    }

    if (!seller) {
      return null;
    }

    return { seller: seller, avatar: avatar || "" };
  }

  function chatButtonHtml(seller, avatar, extraClass) {
    return (
      '<button type="button" class="btn btn-action open-seller-chat' +
      (extraClass ? " " + extraClass : "") +
      '" data-bs-toggle="modal" data-bs-target="#sellerChatModal"' +
      ' data-seller="' +
      escapeHtml(seller) +
      '"' +
      ' data-avatar="' +
      escapeHtml(avatar) +
      '"' +
      ' title="Message ' +
      escapeHtml(sellerFirstName(seller)) +
      '"' +
      ' aria-label="Message ' +
      escapeHtml(sellerFirstName(seller)) +
      '">' +
      '<i class="bi bi-chat-dots"></i></button>'
    );
  }

  function populateModal(seller, avatar, listingName) {
    $("#sellerChatName").text(seller || "Seller");
    $("#sellerChatAvatar").attr({
      src: avatar || "",
      alt: seller || "Seller",
    });

    var greeting = DEFAULT_GREETING;
    if (listingName) {
      greeting = "Hi! Ask me anything about the " + listingName + " listing 👶";
    }

    $("#sellerChatBody").html(
      '<div class="chat-bubble them">' + escapeHtml(greeting) + "</div>",
    );
  }

  function openSellerChat(opts) {
    opts = opts || {};
    if (!$("#sellerChatModal").length) {
      return;
    }

    populateModal(opts.seller, opts.avatar, opts.listing);

    var modalEl = document.getElementById("sellerChatModal");
    if (modalEl && window.bootstrap) {
      window.bootstrap.Modal.getOrCreateInstance(modalEl).show();
    } else {
      $("#sellerChatModal").modal("show");
    }
  }

  function sendMessage() {
    var $input = $("#sellerChatModal .seller-chat-input");
    var msg = $.trim($input.val());
    if (!msg) {
      return;
    }

    var $body = $("#sellerChatBody");
    $body.append('<div class="chat-bubble me">' + escapeHtml(msg) + "</div>");
    $input.val("");
    $body.scrollTop($body[0].scrollHeight);
  }

  function enhanceListingCards() {
    $(".product-card--listing").each(function () {
      var $card = $(this);
      var info = readSellerFromCard($card);
      if (!info) {
        return;
      }

      $card.attr("data-seller", info.seller);
      if (info.avatar) {
        $card.attr("data-seller-avatar", info.avatar);
      }

      var $actions = $card.find(".product-actions .d-flex").first();
      if ($actions.length && !$actions.find(".open-seller-chat").length) {
        $actions.append(chatButtonHtml(info.seller, info.avatar));
      }

      var $sellerRow = $card.find(".listing-seller").first();
      if ($sellerRow.length && !$sellerRow.hasClass("open-seller-chat")) {
        $sellerRow
          .addClass("open-seller-chat seller-chat-link")
          .attr({
            "data-bs-toggle": "modal",
            "data-bs-target": "#sellerChatModal",
            "data-seller": info.seller,
            "data-avatar": info.avatar,
            href: "javascript:;",
            role: "button",
            title: "Message " + sellerFirstName(info.seller),
          })
          .on("click", function (e) {
            e.preventDefault();
          });
      }

      if (
        !$card.find(".open-seller-chat").length &&
        !$card.find(".seller-chat-inline").length
      ) {
        var $info = $card.find(".product-name, h3").first().parent();
        if ($info.length) {
          $info.append(
            '<button type="button" class="btn btn-sm btn-outline-dark rounded-5 mt-2 seller-chat-inline open-seller-chat"' +
              ' data-bs-toggle="modal" data-bs-target="#sellerChatModal"' +
              ' data-seller="' +
              escapeHtml(info.seller) +
              '"' +
              ' data-avatar="' +
              escapeHtml(info.avatar) +
              '">' +
              '<i class="bi bi-chat-dots me-1"></i>Message ' +
              escapeHtml(sellerFirstName(info.seller)) +
              "</button>",
          );
        }
      }
    });
  }

  window.PrelovedBaby = window.PrelovedBaby || {};
  window.PrelovedBaby.openSellerChat = openSellerChat;

  $(function () {
    if (!$("#sellerChatModal").length) {
      return;
    }

    enhanceListingCards();

    $(document).on("show.bs.modal", "#sellerChatModal", function (e) {
      var $trigger = $(e.relatedTarget);
      if (!$trigger.length) {
        return;
      }

      var seller = $trigger.data("seller") || $trigger.attr("data-seller");
      var avatar = $trigger.data("avatar") || $trigger.attr("data-avatar");
      var listing =
        $trigger.data("listing") || $trigger.attr("data-listing") || "";

      if (!seller && $trigger.hasClass("product-card--listing")) {
        var info = readSellerFromCard($trigger);
        if (info) {
          seller = info.seller;
          avatar = info.avatar;
        }
      }

      if (!seller) {
        var $card = $trigger.closest(".product-card--listing");
        if ($card.length) {
          var cardInfo = readSellerFromCard($card);
          if (cardInfo) {
            seller = cardInfo.seller;
            avatar = cardInfo.avatar;
            listing =
              listing || $card.find(".product-name").first().text().trim();
          }
        }
      }

      populateModal(seller, avatar, listing);
    });

    $(document).on("click", ".open-seller-chat", function (e) {
      var $btn = $(this);
      if ($btn.is("a[href]") && $btn.attr("href") !== "javascript:;") {
        return;
      }
      e.preventDefault();
    });

    $(document).on("click", "#sellerChatModal .seller-chat-send", sendMessage);

    $(document).on(
      "keydown",
      "#sellerChatModal .seller-chat-input",
      function (e) {
        if (e.key === "Enter") {
          e.preventDefault();
          sendMessage();
        }
      },
    );
  });
})(jQuery);
