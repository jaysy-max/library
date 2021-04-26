
<div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header" data-background-color="custom-bookrequisition">
                  <h4 class="title">Create Announcements</h4>
              </div>
              <form action="{{url('announcement/store')}}" method="POST">
                @csrf
                    <div class="form-group col-md-12">
                        <h4>Title</h4>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                    </div>
                    <div class="form-group col-md-12">
                        <h4>Message</h4>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Put message here" required></textarea>
                    </div>
                    <div class="form-group col-md-12">
                    <input name="status" type="hidden" value="0" class="form-cotntrol" id="status" required/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
          </div>
      </div>
</div>

