<script type="text/javascript" src="../jquery.js"></script>
<script>
    $(document).ready(function(){
       
       
       $("#submit").click(function(e){
           e.preventDefault();
           
           $("#form1").submit();
           $(".text").attr("disabled","disabled");
       });
    });
</script>    
<form id="form1" action="./disableFieldSubmit.php" method="post">
    <input name="t1" class="text" type="text" >
    <input name="t2" class="text" type="text" >
    
    <select name="s1" class="text">
        <option value="1" selected="selected">one</option>
        <option value="2" selected="selected">two</option>
    </select>
    
    <a href="javascript: void(0)" id="submit">Submit Form</a>
</form>
