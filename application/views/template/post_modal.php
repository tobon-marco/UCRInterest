<div id="post_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Post</h3>
  </div>

<div class="modal-body">
  <div class="errors"> <?php echo validation_errors(); ?> </div>
    <?php echo form_open('', '', 'id="post_form'); ?>
    <table class="table">
      <tr>
        <td>Title</td>
        <td>
          <?php echo form_input('title', set_value('title'), 'id = title'); ?>
        </td>
      </tr>

      <tr>
        <td>Picture <i class="icon-upload"></i></td>
        <td>
          <?php echo form_upload('pic', set_value('pic'), 'id = pic'); ?>
        </td>
      </tr>

      <tr>
        <td>Content</td>
        <td>
          <?php
            $data = array(
                  'name'          => 'content',
                  'id'            => 'content',
                  'class'     => 'text ui-widget-content ui-corner-all',
                  'rows'        => '7',
                  'cols'          => '50',
                  'placeholder' => 'Content'
                );
            echo form_textarea($data);
          ?>
        </td>
      </tr>
    </table>
    <?php echo form_close(); ?>
</div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <?php echo form_submit('submit', 'Post', 'class="btn btn-primary" id="post_submit" data-dismiss="modal" aria-hidden="true"'); ?>
  </div>
</div> 
<script type="text/javascript">
    $('#post_submit').on('click', function(){
      return false;
    });
</script>