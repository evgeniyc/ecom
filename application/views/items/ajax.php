<article class="col-sm-9">
<div class="result">Это некоторый текст</div>
<button onClick="send()">Отправить</button>
</article>
<script>
function send()
		{
			$(".result").load("/ci/items/resp");
		}
</script>
