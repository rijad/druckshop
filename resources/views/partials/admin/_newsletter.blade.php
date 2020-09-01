
<div class="card mb-4 mt-4">
    <div class="card-header"><span>Newsletter</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead> 
                <tfoot>
                    <tr>
                        <th>Email</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>Actions</th> 
                    </tr>
                </tfoot>
                <tbody>
                    @if(!empty($newsletter))
                        @foreach($newsletter as $news)
                        <tr>
                            <td>{{ $news->email }}</td>
                            <td>{{ $news->created_at->format('d M,Y') }}</td>
                            <td><?= ($news->status == 1)? 'Active' : 'InActive'?></td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm"  onclick="replyModal('<?php echo $news->id ?>', '<?php echo $news->email ?>');" data-toggle="modal" data-target="#myModal"> Reply</button>

                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><center>Reply to user</center></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="{{ route('newsLetterSendMail') }}" method="POST">

        {{ csrf_field() }}
        <div class="modal-body">
          <center><h6>User Email: <span id="setEmail"></span></h6></center>
          


          <input type="hidden" id='email' name="email" value="" >
          <textarea name='description' class="form-control" required></textarea>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-default" value="Submit">
      </div>
  </form>
</div>

</div>
</div>


<script>
    function replyModal(id, email) {
        $('input#email').val(email);
        $('#setEmail').html(email);


    }


</script>