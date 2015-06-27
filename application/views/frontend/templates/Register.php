<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Numeracy Assesment</title>

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/css/materialize.min.css">
	<script src="<?php echo base_url();?>public/js/jquery-2.1.1.min.js"></script>
    <script src="<?php echo base_url();?>public/js/materialize.min.js"></script>
   
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/register.css">
  </head>
  <body cz-shortcut-listen="true">
     <header >
            <nav id="header" class="nav-top">
                <div >
                    <a href="/" class="page-title hide-on-med-and-down">Numeracy Assesment</a>
                    <a href="#" data-activates="nav-mobile" class="button-collapse full"><i class="mdi-navigation-menu"></i></a>
                    <ul class="right">
                    </ul>
                </div>
            </nav>
        </header>
      <main>
            <div class="breadcrumbs">
                <div class="green darken-2 white-text">
                </div>
            </div>
            
            
            
<div class="row">
    <div class="col s12 offset-m3 m6">
        <div class="card">
            <div class="card-content">
                <span class="card-title black-text">Sign Up</span>
                
                <form action="register" method="post" id="login-form">
                    <div class="row">
                        <div id="id_fname_container" class="input-field col s6 required">
                            <i class="mdi-action-account-box prefix"></i>
                            <input type="text" name="fname" maxlength="254" id="id_fname">
                            <label for="id_fname">First Name</label>
                        </div>
                        <div id="id_lname_container" class="input-field col s6 required">
                            
                            <input type="text" name="lname" maxlength="254" id="id_lname">
                            <label for="id_lname">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div id="id_password_container" class="input-field col s12 required">
                            <i class="mdi-communication-email prefix"></i>
                            <input type="email" name="email" id="email">
                            <label for="id_password">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div id="id_username_container" class="input-field col s12 required">
                            <i class="mdi-action-visibility prefix"></i>
                            <input type="text" name="age" maxlength="254" id="age">
                            <label for="age">Age</label>
                        </div>
                    </div>
                    <div class="row">
                        <div id="id_username_container" class="input-field col s12 required">
                            <i class="mdi-action-assignment prefix"></i>
                            <input type="text" name="edu_level" maxlength="254" id="edu_level">
                            <label for="edu_level">Education Level</label>
                        </div>
                    </div>
                    <div class="row">
                        <div id="id_password_container" class="input-field col s12 required">
                             <div style="float:left">
                              <span>
                                <i >Gender</i>
                                <input name="gender" value="M" type="radio" id="male" />
                                <label for="male">Male</label>
                                <input name="gender" value="F" type="radio" id="female" />
                                <label for="female">Female</label>
                              </span>
                            </div>
                        </div>
                    </div>
                <div class="card-action right-align">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

        </main>

</body></html>