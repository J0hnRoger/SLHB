{{ Themosis\Facades\Form::input('text', $field['name'], $field['value'], $field['atts']) }}

<input id="test" type="time" value="">

<script>
  var $input = $('input[name="<?php echo $field['name'] ?>"]').hide();
  $('#test').val($input.val()).change(function () {
    $input.val($('#test').val());
  });
</script>
@if(isset($field['features']['info']))
    <div class="themosis-field-info">
        <p>{{ $field['features']['info'] }}</p>
    </div>
@endif
