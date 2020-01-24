</div>
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
    <script>
function myFunction() {
  var myWindow = window.open("", "myWindow", "width=200,height=100");
  myWindow.document.write(<a href="<?php echo $this->facebook->login_url(); ?>"></a>);
  myWindow.opener.document.write("<p>facebook Login !</p>");
}
</script>


</body>
</html>