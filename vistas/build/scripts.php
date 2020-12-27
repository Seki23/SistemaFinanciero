   <!-- jQuery -->
    <script src="<?php echo SERVERURL; ?>vistas/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="<?php echo SERVERURL; ?>vistas/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo SERVERURL; ?>vistas/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo SERVERURL; ?>vistas/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo SERVERURL; ?>vistas/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?php echo SERVERURL; ?>vistas/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- morris.js -->
    <script src="<?php echo SERVERURL; ?>vistas/vendors/raphael/raphael.min.js"></script>
    <script src="<?php echo SERVERURL; ?>vistas/vendors/morris.js/morris.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo SERVERURL; ?>vistas/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo SERVERURL; ?>vistas/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo SERVERURL; ?>vistas/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo SERVERURL; ?>vistas/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo SERVERURL; ?>vistas/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo SERVERURL; ?>vistas/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo SERVERURL; ?>vistas/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo SERVERURL; ?>vistas/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo SERVERURL; ?>vistas/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo SERVERURL; ?>vistas/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo SERVERURL; ?>vistas/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo SERVERURL; ?>vistas/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo SERVERURL; ?>vistas/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo SERVERURL; ?>vistas/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


  <!-- jquery.inputmask -->
  <script src="<?php echo SERVERURL; ?>vistas/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo SERVERURL; ?>vistas/build/js/custom.min.js"></script>
    

    <script type="text/javascript" src="<?php echo SERVERURL; ?>/vistas/vendors/datatables/datatables.min.js"></script>  
    <script src="<?php echo SERVERURL; ?>vistas/vendors/validator/multifield.js"></script>
    <script src="<?php echo SERVERURL; ?>vistas/vendors/validator/validator.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
   <script>
    function hideshow(){
      var password = document.getElementById("password1");
      var slash = document.getElementById("slash");
      var eye = document.getElementById("eye");
      
      if(password.type === 'password'){
        password.type = "text";
        slash.style.display = "block";
        eye.style.display = "none";
      }
      else{
        password.type = "password";
        slash.style.display = "none";
        eye.style.display = "block";
      }

    }
  </script>

    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>
