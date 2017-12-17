<script type="text/javascript">
function chk () {
  $('#chk').find('input[type=checkbox]:checked').remove();
}
function clears () {
    document.getElementById('chk[]').removeAttribute('checked');
}
</script>
<div id="chk">
  <input type="checkbox" id="chk[]" name="" value=""  checked>
  <input type="checkbox" id="chk[]" name="" value=""  >
  <input type="checkbox" id="chk[]" name="" value=""  >
  <input type="checkbox" id="chk[]" name="" value=""  >
  <input type="button" name="" value="" onclick="chk()">
</div>
