<div class="well well-sm well-light">
  <div class="card-header col-sm-10">
    <div style="display:flex">
        <div style="width:90%">
            <h3 class="card-title">Add New Product</h3>
            <br>
            <p class="text-secondary"></p>
        </div>
        <div style="width:10%" class="pull-right">
            <a class="btn btn-secondary" href="{{ route('product.index') }}">Back</a>
        </div>
    </div>
  </div>
  <form action="{{ route('product.store') }}" method="POST">
  @csrf
  <div class='row'>
    <div class="col-sm-12">
      <div class="pull-left">
        <b>ID :</b>
      </div>
    </div>
  </div>
  <div class='row'>
    <div class="col-sm-12">
      <!-- <div style="display:flex;"> -->
      <div style="padding-left: 0px;" class="col-sm-10">
        <input name="id" type="text" class="form-control" placeholder="">
      </div>
      <!-- </div> -->
    </div>
  </div>
  <div class='row'>
    <div class="col-sm-12">
      <div class="pull-left">
        <b>Desc :</b>
      </div>
    </div>
  </div>
  <div class='row'>
    <div class="col-sm-12">
      <!-- <div style="display:flex;"> -->
      <div style="padding-left: 0px;" class="col-sm-10">
        <input name="desc" type="text" class="form-control" placeholder="">
      </div>
      <!-- </div> -->
    </div>
  </div>
  <div class='row'>
    <div class="col-sm-12">
      <div class="pull-left">
        <b>Price :</b>
      </div>
    </div>
  </div>
  <div class='row'>
    <div class="col-sm-12">
      <!-- <div style="display:flex;"> -->
      <div style="padding-left: 0px;" class="col-sm-10">
        <input name="price" type="text" class="form-control" placeholder="">
      </div>
      <!-- </div> -->
    </div>
  </div>
  <div style="display:flex">
    <div style="width:50%">
      <div class='row'>
        <div class="col-sm-12">
          <div class="pull-left">
            <b>Title :</b>
          </div>
        </div>
      </div>
      <div class='row'>
        <div class="col-sm-12">
          <div style="display:flex;">
            <div style="padding-left: 0px;" class="col-sm-8">
              <input name="title" type="text" class="form-control datepicker" placeholder="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class='row'>
    <div class="col-sm-5">
    </div>
    <div class="col-sm-5">
      <div class="pull-left">
        <button type="submit" class="btn btn-sm btn-info">SAVE</button>
      </div>
    </div>
  </div>
  </form>
</div>