<?php
  $fileName =  basename($_SERVER["SCRIPT_FILENAME"], '.php');
?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Index.php"><i class="fa fa-plus-square"></i> Add New User</a></li>
            <li><a href="profile.php"><i class="fa fa-circle-o"></i> Profile</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Data</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data.php"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>

        <?php 


          $menuClass = "";
          
          if(in_array(  $fileName , array('allclasses','addclass'))){
            $menuClass = "active menu-open";            
          }


        ?>
        <li class="treeview <?php echo $menuClass; ?>">
          <a href="#">
            <i class="fa fa-group"></i> <span>Class</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu ">
            <li class="<?php echo ($fileName === 'addclass') ? 'active' : ''; ?>"><a href="addclass.php"><i class="fa fa-plus-square"></i> Add New Class</a></li>
            <li class="<?php echo ($fileName === 'allclasses') ? 'active' : ''; ?>"><a href="allclasses.php"><i class="fa fa-circle-o"></i> All Classes</a></li>
          </ul>
        </li>

        <?php
          $menuClass = "";
          if(in_array(  $fileName , array('addsubject','allsubjects'))){
            $menuClass = "active menu-open";            
          }

        ?>



        <li class="treeview <?php echo $menuClass; ?>">
          <a href="#">
            <i class="fa fa-book"></i> <span>Subjects</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($fileName === 'addsubject') ? 'active' : ''; ?>"><a href="addsubject.php"><i class="fa fa-plus-square"></i> Add New Subjects</a></li>
            <li class="<?php echo ($fileName === 'allsubjects') ? 'active' : ''; ?>"><a href="allsubjects.php"><i class="fa fa-circle-o"></i> All Subjects</a></li>
          </ul>
        </li>

        <?php
          $menuClass = "";
          if(in_array(  $fileName , array('addchapter','allchapters'))){
            $menuClass = "active menu-open";            
          }

        ?>
        <li class="treeview <?php echo $menuClass; ?>">
          <a href="#">
            <i class="fa fa-book"></i> <span>Chapters</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($fileName === 'addchapter') ? 'active' : ''; ?>"><a href="addchapter.php"><i class="fa fa-plus-square"></i> Add New Chapter</a></li>
            <li class="<?php echo ($fileName === 'allchapters') ? 'active' : ''; ?>"><a href="allchapters.php"><i class="fa fa-circle-o"></i> All Chapters</a></li>
          </ul>
        </li>

        <?php
          $menuClass = "";
          if(in_array(  $fileName , array('addcountry','allcountries'))){
            $menuClass = "active menu-open";            
          }

        ?>
        <li class="treeview <?php echo $menuClass; ?>">
          <a href="#">
            <i class="fa fa-flag-checkered "></i> <span>Country</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($fileName === 'addcountry') ? 'active' : ''; ?>"><a href="addcountry.php"><i class="fa fa-plus-square"></i> Add New Country</a></li>
            <li class="<?php echo ($fileName === 'allcountries') ? 'active' : ''; ?>"><a href="allcountries.php"><i class="fa fa-circle-o"></i> All Countries</a></li>
          </ul>
        </li>

        <?php
          $menuClass = "";
          if(in_array(  $fileName , array('addstate','allstates'))){
            $menuClass = "active menu-open";            
          }

        ?>
        <li class="treeview <?php echo $menuClass; ?>">
          <a href="#">
            <i class="fa  fa-flag"></i> <span>State</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($fileName === 'addstate') ? 'active' : ''; ?>"><a href="addstate.php"><i class="fa fa-plus-square"></i> Add New State</a></li>
            <li class="<?php echo ($fileName === 'allstates') ? 'active' : ''; ?>"><a href="allstates.php"><i class="fa fa-circle-o"></i> All States</a></li>
          </ul>
        </li>

        <?php
          $menuClass = "";
          if(in_array(  $fileName , array('adddistrict','alldistricts'))){
            $menuClass = "active menu-open";            
          }

        ?>
        <li class="treeview <?php echo $menuClass; ?>">
          <a href="#">
            <i class="fa fa-map-marker"></i> <span>District</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($fileName === 'adddistrict') ? 'active' : ''; ?>"><a href="adddistrict.php"><i class="fa fa-plus-square"></i> Add New District</a></li>
            <li class="<?php echo ($fileName === 'alldistricts') ? 'active' : ''; ?>"><a href="alldistricts.php"><i class="fa fa-circle-o"></i> All Districts</a></li>
          </ul>
        </li>

        <?php
          $menuClass = "";
          if(in_array(  $fileName , array('addcity','allcities'))){
            $menuClass = "active menu-open";            
          }

        ?>
        <li class="treeview <?php echo $menuClass; ?>">
          <a href="#">
            <i class="fa fa-map-marker"></i> <span>City</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($fileName === 'addcity') ? 'active' : ''; ?>"><a href="addcity.php"><i class="fa fa-plus-square"></i> Add New City</a></li>
            <li class="<?php echo ($fileName === 'allcities') ? 'active' : ''; ?>"><a href="allcities.php"><i class="fa fa-circle-o"></i> All Cities</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  