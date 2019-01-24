@if(session('status'))
<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
  <h4><i class="icon fa fa-check"></i>{{session('status')}}</h4>
</div>
@endif
