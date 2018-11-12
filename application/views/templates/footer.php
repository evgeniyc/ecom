</main>
		<footer class="row">
			<div class="col-12"><center><?php echo date('Y');?>&#169;CallMarket</center></div>
		</footer>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS --> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script>
		var addr = window.location.href;
		$("nav a").each(function(){
			if($(this).attr("href") == addr)
				$(this).addClass("active");
		});
	/*	$("#a_add_img").mouseover(function(){ 
			var val = $( "select[name='cat']" ).val(); 
			var a = $( "#a_add_img"); 
			var a_text = a.attr("href"); 
			var arr = a_text.split("/");
			if(arr.length > 2)
			{
				arr = arr.slice(0,2);
				a_text = arr.join("/");
			}
			a_text = a_text + "/" + val;
			a.attr("href", a_text);
			});
	*/		
	</script>
	</body>
</html>