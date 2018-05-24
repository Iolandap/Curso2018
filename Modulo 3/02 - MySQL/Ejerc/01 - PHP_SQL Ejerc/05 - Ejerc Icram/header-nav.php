<div class="jumbotron">
  <div class="container text-center">
    <h1>Gestor Productos</h1>      
    <p>Mission, Vission & Values</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <!-- Barra menu horizontal -->
    <div class="collapse navbar-collapse" id="myNavbar">
        <!-- Menu izquierda -->
        <ul class="nav navbar-nav">
            <!-- Llamada a las paginas segun opcion del menu seleccionado -->
            <li id="home">      <a href="./">               home    </a></li>
            <li id="productos"> <a href="productos.php">    Products</a></li>
            <li id="contacto">  <a href="#">                Contact </a></li>
        </ul>
        <!-- Menu derecha LOG IN -->
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#modalForm"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
  </div>
</nav>

<!-- ******************************* -->
<!--         Modal de LOG IN         -->
<!-- ******************************* -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Contact Form</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Enter your email"/>
                    </div>

                    <div class="form-group">
                        <label for="inputName">Password</label>
                        <input type="password" class="form-control" id="inputName" placeholder="Enter your password"/>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
            </div>
        </div>
    </div>
</div>

<script>

    // Funcion control Log In
    function submitContactForm(){
        var reg     = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        // Cargamos los valores entrados desde el INPUT
        var name    = $('#inputName').val();
        var email   = $('#inputEmail').val();

        if(name.trim() == '' ){
            alert('Please enter your name.');
            $('#inputName').focus();
            return false;
        }else if(email.trim() == '' ){
            alert('Please enter your email.');
            $('#inputEmail').focus();
            return false;
        }else if(email.trim() != '' && !reg.test(email)){
            alert('Please enter valid email.');
            $('#inputEmail').focus();
            return false;
        }else{
            // Cuando esta todo bien, llamamos al fichero LOGIN.PHP para verificar si cuadra con nuestra base datos paswords
            $.ajax({
                type:   'POST',
                url:    'login.php',
                // cargamos las variables que hemos definido al principio de la funcion
                data:   'contactFrmSubmit=1&name='+name+'&email='+email,

                    beforeSend: function () {
                        $('.submitBtn').attr("disabled","disabled");
                        $('.modal-body').css('opacity', '.5');
                    },

                    success:function(msg){
                        if(msg == 'ok'){
                            window.load.href = 'home.php';
                        }else{
                            $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                        }
                        $('.submitBtn').removeAttr("disabled");
                        $('.modal-body').css('opacity', '');
                    }
            });
        }
    }
</script>