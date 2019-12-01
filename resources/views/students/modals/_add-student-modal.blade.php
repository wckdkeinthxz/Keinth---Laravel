<!-- Modal -->
<div class="modal fade" id="add-student-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('students.store') }}" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                @csrf
                <input class="form-control mb-2" name="first_name" placeholder="First Name"/>
                <input class="form-control mb-2" name="middle_name" placeholder="Middle Name"/>
                <input class="form-control mb-2" name="last_name" placeholder="Last Name"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Student </button>
      </div>
      </form>
    </div>
  </div>
</div>