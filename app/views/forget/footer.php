
    <script type="text/javascript">
      $('.txtlang').change(function(){
        var val = $(this).val();
        var url = '<?php echo site_url('/')?>' + val;
        window.location = url;
        //alert(url);
      });
    </script>
</html>