<script>
function test(){
var str=document.getElementById("text").value;
document.getElementById("t").innerHTML="<a href='"+str+"'>test</a>";
}
</script>
<div id="t"></div>
<input type="text" id="text" value="" />
<input type="button" id="s" value="write" onclick="test()" />