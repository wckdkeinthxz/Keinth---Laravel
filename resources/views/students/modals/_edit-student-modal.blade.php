<!-- Modal -->
<div class="modal fade" id="edit-student-modal-{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('students.update') }}" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                @csrf
                <input type="hidden" name="id" value="{{ $student->id }}"/>
                <input class="form-control mb-2" name="first_name" placeholder="First Name" value="{{ $student->first_name}}" />
                <input class="form-control mb-2" name="middle_name" placeholder="Middle Name" value="{{ $student->middle_name}}" />
                <input class="form-control mb-2" name="last_name" placeholder="Last Name" value="{{ $student->last_name}}" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Student </button>
      </div>
      </form>
    </div>
  </div>
</div>