<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel de Control</title>

    <!-- Bootstrap Core ../css -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom ../css -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts ../css -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.../css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" style="height:700px;">

            <div class="container-fluid">
 <form role="form" action="login" method="post">
                <div class="row">
                    <div class="col-lg-4 col-md-9 center-block" style="float: none;">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4" style="height:50px;">
                                        USUARIO:
                                    </div>
                                    <div class="col-xs-8 text-right"  style="height:50px;">
                                         <input class="form-control" type="text" name="username">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4"  style="height:50px;">
                                        CONTRASEÑA:
                                    </div>
                                    <div class="col-xs-8 text-right"  style="height:50px;">
                                         <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                            
                             <div class="row">
                                    <div class="col-xs-4"  style="height:50px;">
   
                                    </div>
                                    <div class="col-xs-8 text-right"  style="height:50px;">
                                         <button type="submit" class="btn btn-default">Entrar</button>
                                    </div>
                                </div>
                               <div class="row">
                                    <div class="col-xs-4"  style="height:50px;">
                               
                                    </div>
                                    <div class="col-xs-8 text-right"  style="height:50px;">
                                         <?=utf8_encode(validation_errors())?>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->
         </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>
