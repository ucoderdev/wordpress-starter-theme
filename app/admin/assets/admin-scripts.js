jQuery(document).ready(function ($) {
  /* Gallery select */
  $('.btn-select-gallery').click(function () {
    var button = $(this),
      parent = $(this).closest('.select-gallery-box'),
      input = parent.find('.select-gallery-input'),
      img_block = parent.find('.select-gallery-box-img');

    wp.media.editor.send.attachment = function (props, attachment) {
      if (attachment != undefined && attachment.url != undefined && attachment.url != '') {
        input.val(attachment.url);

        if (img_block != undefined && img_block.length > 0) {
          var img = '<img src="' + attachment.url + '" alt="image" />';
          img_block.html(img);
        }
      } else {
        alert('Please select a valid file');
        return false;
      }
    }

    wp.media.editor.open(button);
    return false;
  });
});
