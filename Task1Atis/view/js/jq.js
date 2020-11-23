let dummy = '';
let dummy1;
$('table').on('click', 'tr .a', function (e) {

  var id1 = $(this).attr('id');
  $.ajax({
    type: 'POST',
    url: '../controller/index.php',
    data: { check: id1 },
    success: function (response) {
    }
  });
  $(this).parents('tr').remove();

});



$('input').on('keyup', function (e) {
  ser = this.value;
  dummy = ser;
  $.ajax({
    type: 'POST',
    url: '../controller/index.php',
    data: {
      searchIn: ser,
      sel: dummy1
    },
    success: function (response) {
      console.log('Data', {
        searchIn: ser,
        sel: dummy1
      })
      var ps1 = response.search('<table');
      var ps2 = response.search("</table>") + 8;
      var use = response.substring(ps1, ps2);
      $("table").html(use);
    }
  });
});

$('#srt').on('change', function (e) {
  e.preventDefault();
  que = this.value;
  dummy1 = que;
  $.ajax({
    type: 'POST',
    url: '../controller/index.php',
    data: {
      sel: que,
      searchIn: dummy
    },
    success: function (response) {
      console.log('Data', {
        sel: que,
        searchIn: dummy
      })
      var ps1 = response.search('<table');
      var ps2 = response.search("</table>") + 8;
      var use = response.substring(ps1, ps2);
      $("table").html(use);
    }
  });
});
$(document).ready()
{
  $('.page').on('click', function (e) {
    e.preventDefault();
    id = $(this).attr('id');
    if (id <= 1)
      previous_page = 1;
    else
      previous_page = parseInt(id, 10) - 1;
    if (id >= parseInt($('.last').attr('id')))
      next_page = parseInt($('.last').attr('id'));
    else
      next_page = parseInt(id, 10) + 1;
    $.ajax({
      type: 'GET',
      url: '../controller/index.php',
      data: {
        page_no: id,
        searchIn: dummy,
        sel: dummy1
      },
      success: function (response) {

        var ps1 = response.search('<table');
        var ps2 = response.search("</table>") + 8;
        var use = response.substring(ps1, ps2);
        $("table").html(use);
        $('.next').attr('id', next_page)
        $('.previous').attr('id', previous_page) 
      }
    });
  });
}





