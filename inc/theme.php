<?php
if(isset($empid) || isset($adminemail))
{
  $select = new Selectall();
  $theme = $select->themeconfig();


  if($theme != "")
  {
    $preloader = $theme['in_preloader'];
    $pageload = $theme['in_pageload'];
    $headfix = $theme['in_headfix'];
    $sidefixed = $theme['in_sidefixed'];
    $sidecollpse = $theme['in_sidecollpse'];
    $flatstyle = $theme['in_flatstyle'];
    $legacystyle = $theme['in_legacystyle'];
    $compact = $theme['in_compact'];
    $topheader = $theme['in_topheader'];
    $mainsidebar = $theme['in_mainsidebar'];
    $sidebarmenu = $theme['in_sidebarmenu'];
    $brandlogo = $theme['in_brandlogo'];

  }
  else
  {
    $preloader = "";
    $pageload = "";
    $headfix = "";
    $sidefixed = "";
    $sidecollpse = "";
    $flatstyle = "";
    $legacystyle = "";
    $compact = "";
    $topheader = "";
    $mainsidebar = "";
    $sidebarmenu = "";
    $brandlogo = "";
  }
}

?>
<script type="text/javascript">
  $(document).ready(function(){

    var preloader = "<?php echo @$preloader;?>";
    var pageload = "<?php echo @$pageload;?>";
    var headfix = "<?php echo @$headfix;?>";
    var sidefixed = "<?php echo @$sidefixed;?>";
    var sidecollpse = "<?php echo @$sidecollpse;?>";
    var flatstyle = "<?php echo @$flatstyle;?>";
    var legacystyle = "<?php echo @$legacystyle;?>";
    var compact = "<?php echo @$compact;?>";
    var topheader = "<?php echo @$topheader;?>";
    var mainsidebar = "<?php echo @$mainsidebar;?>";
    var sidebarmenu = "<?php echo @$sidebarmenu;?>";
    var brandlogo = "<?php echo @$brandlogo;?>";

    if(preloader != "")
    {
      var $perloader = $('.preloader');
      $perloader.addClass('prenone');

    }
    else
    {
      var $perloader = $('.preloader');
      $perloader.removeClass('prenone');
    }

    if(pageload != "")
    {
      var $main_loader = $('.mainbody');
      $main_loader.removeClass('mainbody');
      $main_loader.addClass(pageload);
        
            
    }

    if(headfix != "")
    {
      $('body').addClass('layout-navbar-fixed');
    }
    else
    {
      $('body').removeClass('layout-navbar-fixed');
    }

    if(sidefixed != "")
    {
      $('body').addClass('layout-fixed');
      $(window).trigger('resize');
    }
    else
    {
      $('body').removeClass('layout-fixed');
      $(window).trigger('resize');
    }

    if(sidecollpse != "")
    {
      $('body').addClass('sidebar-collapse');
      $(window).trigger('resize');
    }
    else
    {
      $('body').removeClass('sidebar-collapse');
      $(window).trigger('resize');
    }
    if(flatstyle != "")
    {
      $('.nav-sidebar').addClass('nav-flat');
    }
    else
    {
      $('.nav-sidebar').removeClass('nav-flat');
    }
    if(legacystyle != "")
    {
      $('.nav-sidebar').addClass('nav-legacy');
    }
    else
    {
       $('.nav-sidebar').removeClass('nav-legacy');
    }

    if(compact != "")
    {
      $('.nav-sidebar').addClass('nav-compact');
    }
    else
    {
      $('.nav-sidebar').removeClass('nav-compact');
    }

    if(topheader != "")
    {
      switch(topheader)
      {
        case "bg-primary":
        var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white').removeClass('navbar-light');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;
        case "bg-success":
        var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white').removeClass('navbar-light');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;
        case "bg-warning":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader);
        break;
        case "bg-info":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white').removeClass('navbar-light');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;
        case "bg-dark":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;

        case "bg-light":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader);
        break;
        case "bg-secondary":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;
        case "bg-danger":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;
        case "bg-indigo":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;
        case "bg-lightblue":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;
        case "bg-purple":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;
        case "bg-fuchsia":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;
        case "bg-pink":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;
        case "bg-maroon":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;
        case "bg-lime":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader);
        break;
        case "bg-teal":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;
        case "bg-olive":
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader).addClass('navbar-dark');
        break;

        default:
          var $main_header = $('.main-header');
        $main_header.removeClass('navbar-white');
        $main_header.addClass(topheader);
        break; 
      }
        
            
    }
    if(mainsidebar != "")
    {
      switch(mainsidebar)
      {
        case "bg-primary":
        var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-success":
        var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-warning":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-info":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-dark":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;

        case "bg-light":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-secondary":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-danger":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-indigo":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-lightblue":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-purple":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-fuchsia":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-pink":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-maroon":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-lime":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-teal":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;
        case "bg-olive":
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break;

        default:
          var $main_sidebar = $('.main-sidebar');
        $main_sidebar.removeClass('sidebar-dark-danger');
        $main_sidebar.addClass(mainsidebar);
        break; 
      }
        
            
    }
    if(sidebarmenu != "")
    {
      switch(sidebarmenu)
      {
        case "bg-primary":
        var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-success":
        var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-warning":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-info":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-dark":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;

        case "bg-light":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-secondary":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-danger":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-indigo":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-lightblue":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-purple":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-fuchsia":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-pink":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-maroon":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-lime":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-teal":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;
        case "bg-olive":
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break;

        default:
          var $sidemen = $('.sidemen');
        $sidemen.addClass(sidebarmenu);
        break; 
      }
        
            
    }
    if(brandlogo != "")
    {
      switch(brandlogo)
      {
        case "bg-primary":
        var $bandlogo = $('.brand-link');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;
        case "bg-success":
        var $bandlogo = $('.brand-link');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;
        case "bg-warning":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-dark');
        break;
        case "bg-info":
          var $bandlogo = $('.brand-link');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;
        case "bg-dark":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;

        case "bg-light":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-dark');
        break;
        case "bg-secondary":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;
        case "bg-danger":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;
        case "bg-indigo":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;
        case "bg-lightblue":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;
        case "bg-purple":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;
        case "bg-fuchsia":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;
        case "bg-pink":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;
        case "bg-maroon":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;
        case "bg-lime":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-dark');
        break;
        case "bg-teal":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;
        case "bg-olive":
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo).addClass('text-light');
        break;

        default:
          var $bandlogo = $('.brand-link');
        $bandlogo.removeClass('navbar-white');
        $bandlogo.addClass(brandlogo);
        break; 
      }
    }
  });
</script>