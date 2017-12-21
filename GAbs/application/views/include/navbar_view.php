<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Administration</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="http://localhost/GAbs/">Page Principale</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Creer Compte/Module <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="http://localhost/GAbs/index.php/admin/insertAdmin">Compte Admin</a></li>
                    <li><a href="http://localhost/GAbs/index.php/admin/insertEns">Compte Enseignant</a></li>
                    <li><a href="http://localhost/GAbs/index.php/admin/insertEtu">Compte Etudiant</a></li>
                    <li class="divider"></li>
                    <li><a href="http://localhost/GAbs/index.php/admin/insertModule">Creer un module</a></li>        
                </ul>
            <li><a href="http://localhost/GAbs/index.php/Backup">Sauvegarde (BackUP)</a></li>
            </li>
        </ul>
        <div class="col-sm-3 col-md-3 pull-right">
            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>        
    </div>
</nav>