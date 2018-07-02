<!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.1.js" integrity="sha256-eNcUzO3jsv0XlJLveFEkbB8bA7/CroNpNVk3XpmnwHc=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.jqueryui.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>



<script>
$(document).ready(function(){
 $('#submit').click(function(){
 var insert = [];
 $('.get_value').each(function(){
 if($(this).is(":checked"))
 {
 insert.push($(this).val());
 }
 });
 insert = insert.toString();
 $.ajax({
 url: "insert.php",
 method: "POST",
 data:{insert:insert},
 success:function(data){
 $('#result').html(data);
 }
 });
 });
});
</script>
</body>

</html>
