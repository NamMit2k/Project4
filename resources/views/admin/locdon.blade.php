<form action="{{URL::to('/search-order')}}" method="POST" style="display:flex;">
	  {{csrf_field()}}  
	<div class="form-group">
		<input type="date" name="date1" class="form-control">					
	</div>
	<div class="form-group">
		<input type="date" name="date2" class="form-control" >					
	</div>
	<input class="form-control"  type="submit" name="" value="Tìm kiếm">
</form>	
